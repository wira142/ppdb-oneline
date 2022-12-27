<?php

namespace App\Http\Controllers;

use App\Services\FileService;

class RegistrationFormController extends Controller
{
    public function __construct(FileService $fileservice)
    {
        $this->fileService = $fileservice;
    }
}
