<?php

namespace App\Http\Controllers;

use App\Models\School;

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
    public function storeRegistration(School $school)
    {
        return $school;
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
