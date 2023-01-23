<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationForm;
use App\Models\School;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function __construct(FileService $file_service)
    {
        $this->file = $file_service;
    }
    public function submission()
    {
        $submission = Registration::where('user_id', auth()->user()->id)->get();
        foreach ($submission as $key => $sub) {
            $sub->title_form = $sub->form->title;
            $sub->school_name = $sub->form->school->name;

            //check time
            if ($sub->status == 'qualify') {
                $start_date = strtotime($sub->updated_at);
                $end_date = strtotime(date(now()));
                $time_life = (($end_date - $start_date) / (60 * 60)) / 24;
                if ($time_life >= 3) {
                    Registration::where('registration_id', $sub->registration_id)->first()->update(['status' => 'rejected']);
                }
            }
        }
        return view('user.submission', ['page' => 'submission', 'submission' => $submission]);
    }
    public function detailSubmission(Registration $registration)
    {
        $registration->title_form = $registration->form->title;
        $registration->school_name = $registration->form->school->name;
        $registration->form->poster = $this->file->getObjUrl('public/poster-images/', $registration->form, 'poster');
        return view('user.action_submission', ['page' => 'submission', 'submission' => $registration]);
    }
    public function storeRegistration(RegistrationForm $form)
    {
        try {
            $user_id = auth()->user()->id;
            DB::beginTransaction();
            if (Registration::where([['user_id', $user_id], ['form_id', $form->form_id]])->where(function ($query) {
                $query->where('status', 'register')->orWhere('status', 'accepted')->orWhere('status', 'qualify');
            })->get()->isEmpty() == 0) {
                return redirect()->back()->with('failed', 'you is have been registered!');
            } else if (strtotime($form->time_expired) < strtotime(date(now()))) {
                return redirect()->back()->with('failed', 'Registration time is up!');
            } else {
                $registrator = [
                    'user_id' => $user_id,
                    'form_id' => $form->form_id,
                    'status' => "register",
                ];
                Registration::create($registrator);
                DB::commit();
                return redirect('/user/submission')->with('success', 'You are success register!');
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
    public function acceptRegistration(Registration $registration)
    {
        try {
            DB::beginTransaction();
            $start_date = strtotime($registration->updated_at);
            $end_date = strtotime(date(now()));
            $time_life = (($end_date - $start_date) / (60 * 60)) / 24;
            if ($time_life >= 3) {
                if ($registration->status == 'qualify') {
                    Registration::where([['registration_id', $registration->registration_id], ['user_id', auth()->user()->id]])->first()->update(['status' => 'rejected']);
                }
                return back()->with('failed', 'sorry,your time is up!');
            } else {
                Registration::where([['user_id', auth()->user()->id], ['status', '!=', 'accepted'], ['registration_id', '!=', $registration->registration_id]])->update(['status' => 'rejected']);
                $update = ['status' => 'accepted'];
                $registration->update($update);
                return redirect('/user/submission')->with('success', 'Congratulations, you have been accepted at a school of your choice!');
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
    public function rejectRegistration(Registration $registration)
    {
        try {
            DB::beginTransaction();
            Registration::where([['registration_id', $registration->registration_id], ['user_id', auth()->user()->id]])->first()->update(['status' => 'rejected']);
            return redirect('user/submission')->with('success', 'Rejected school is success');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('user/submission')->with('failed', 'Rejected school is failed!');
        }
    }

    //owner
    public function registrators()
    {
        $registrators = auth()->user()->school->registrationForm;
        $students = [];
        foreach ($registrators as $key => $form) {
            $registrations = $form->registrator;
            foreach ($registrations as $key => $register) {
                $user = $register->user;
                $user->form_name = $form->title;
                $user->status_form = $register->status;
                $user->registration_id = $register->registration_id;
                array_push($students, $user);
            }
        }
        $students = $this->file->getUrl('public/profile_images/', $students, 'image');
        return view('owner.registrators', ['page' => 'registrators', "students" => $students]);
    }
    public function qualifyRegistrators(Registration $registration)
    {
        try {
            DB::beginTransaction();
            if ($registration->status == 'rejected') {
                return back()->with('failed', 'Sorry, the registration has been rejected!');
            } else {
                $update = ['status' => 'qualify'];
                $registration->update($update);
                return back()->with('success', 'The registration pass the qualifications!');
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
    public function rejectRegistrators(Registration $registration)
    {
        try {
            DB::beginTransaction();
            if ($registration->status == 'rejected') {
                return back()->with('failed', 'Sorry, the registration has been rejected!');
            } else {
                $update = ['status' => 'rejected'];
                $registration->update($update);
                return back()->with('failed', 'The Registration does not qualify!');
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
    public function showStudent(User $user, Registration $registration_id)
    {
        $personal = $user->personal;
        $father = $user->father;
        $mother = $user->mother;
        $user->image = $this->file->getObjUrl('public/profile_images/', $user, 'image');
        $user->form_id = $registration_id;
        $user->status_form = $registration_id->status;
        return view('owner.show-student', [
            'page' => 'registrators',
            'personal' => $personal,
            'father' => $father,
            'mother' => $mother,
            'user' => $user,
        ]);
    }
}
