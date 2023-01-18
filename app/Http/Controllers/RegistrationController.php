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
            DB::beginTransaction();
            $registrator = [
                'user_id' => auth()->user()->id,
                'form_id' => $form->form_id,
                'status' => "register",
            ];
            Registration::create($registrator);
            DB::commit();
            return redirect('/user/submission')->with('success', 'You are success register!');
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
