<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        $personal = auth()->user()->personal;
        $father = auth()->user()->father;
        $mother = auth()->user()->mother;

        return view('user.user_profile', [
            'personal' => $personal,
            'father' => $father,
            'mother' => $mother,
        ]);
    }
}
