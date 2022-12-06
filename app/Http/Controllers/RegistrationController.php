<?php

namespace App\Http\Controllers;

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
}
