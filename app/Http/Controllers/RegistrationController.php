<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\RegistrationForm;
use App\Models\School;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function submission()
    {
        return view('user.submission', ['page' => 'submission']);
    }
    public function detailSubmission($registration)
    {
        return view('user.action_submission', ['page' => 'submission', 'status' => $registration]);
    }
    public function storeRegistration(RegistrationForm $form)
    {
        try {
            $user_id = auth()->user()->id;
            DB::beginTransaction();
            if (Registration::where([['user_id', $user_id], ['form_id', $form->form_id], function ($query) {
                $query->where('status', 'register')->orWhere('status', 'accepted');
            }])) {
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
