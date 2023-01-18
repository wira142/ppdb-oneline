<?php

namespace App\Http\Controllers;

use App\Models\RegistrationForm;
use App\Services\FileService;

class RegistrationFormController extends Controller
{
    public function __construct(FileService $fileservice)
    {
        $this->fileService = $fileservice;
    }
    public function index()
    {
        $forms = RegistrationForm::get();
        return view('owner.forms', ['page' => 'forms', 'forms' => $forms]);
    }
    public function show($form)
    {
        return view('owner.show_form', ['page' => 'forms']);
    }
}
