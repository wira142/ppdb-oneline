<?php

namespace App\Http\Controllers;

class SchoolController extends Controller
{
    public function index()
    {
        return view('schools_page', ['page' => 'school']);
    }
    public function show()
    {
        return view('show_school', ['page' => 'school']);
    }
}
