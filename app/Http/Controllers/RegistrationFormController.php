<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosterRequest;
use App\Models\Registration;
use App\Models\RegistrationForm;
use App\Services\FileService;
use Illuminate\Support\Facades\DB;

class RegistrationFormController extends Controller
{
    public function __construct(FileService $fileservice)
    {
        $this->fileService = $fileservice;
    }
    public function index()
    {
        $forms = RegistrationForm::get();
        $forms = $this->fileService->getUrl('public/poster-images/', $forms, 'poster');
        return view('owner.forms', ['page' => 'forms', 'forms' => $forms]);
    }
    public function newPoster()
    {
        return view('owner.store_new_poster', ['page' => 'forms']);
    }
    public function show(RegistrationForm $form)
    {
        $form->poster = $this->fileService->getObjUrl('public/poster-images/', $form, 'poster');
        return view('owner.show_form', ['page' => 'forms', 'form' => $form]);
    }

    public function storePoster(PosterRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            $validated['poster'] = $this->fileService->store('public/poster-images', $request->file('poster'));
            $validated['user_id'] = auth()->user()->id;
            RegistrationForm::create($validated);
            DB::commit();
            return redirect('/user/forms')->with('success', 'Poster success uploaded!');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect('/user/forms')->with('failed', 'Poster failed uploaded!');
        }
    }
    public function updatePoster(PosterRequest $request, RegistrationForm $form)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            if ($form->poster == $request->file('poster') || $request->file('poster') == null) {
                $validated['poster'] = $this->fileService->update('public/poster-images', $form->poster);
            } else {
                $validated['poster'] = $this->fileService->update('public/poster-images', $form->poster, $request->file('poster'));
            }
            $validated['user_id'] = auth()->user()->id;
            $form->update($validated);
            DB::commit();
            return redirect('/user/forms')->with('success', 'Poster success updated!');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th;
            return redirect('/user/forms')->with('failed', 'Poster failed updated!');
        }
    }
}
