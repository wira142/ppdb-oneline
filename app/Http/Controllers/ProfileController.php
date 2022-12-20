<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        $personal = auth()->user()->personal;
        return view('user.user_profile', ['personal' => $personal]);
    }
}
