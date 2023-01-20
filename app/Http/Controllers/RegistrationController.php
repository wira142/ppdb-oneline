<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationForm;
use App\Models\School;
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

    //owner
    public function registrators()
    {
        return view('owner.registrators', ['page' => 'registrators']);
    }
    public function showStudent()
    {
        return view('owner.show-student', ['page' => 'registrators']);
    }
}
