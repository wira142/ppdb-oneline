<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\School;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{

    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }
    public function index()
    {
        return view('schools_page', ['page' => 'school']);
    }
    public function show()
    {
        return view('show_school', ['page' => 'school']);
    }
    public function mySchool()
    {
        return view('user.school', ['page' => '']);
    }
    public function editSchool()
    {
        $school = auth()->user()->school;
        return view('owner.edit_school', ['page' => '', 'school' => $school]);
    }

    public function store(SchoolRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        try {
            DB::beginTransaction();
            $validated['school_image'] = $this->fileService->store('public/school_images', $request->file('school_image'));
            School::create($validated);
            User::where('id', auth()->user()->id)->update(['level' => 'owner']);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Add school data is success!');
        } catch (\Exception$th) {
            DB::rollBack();
            return $th;
            return redirect()->route('profile')->with('error-query', 'Add school data is failed!');
        }
    }
    public function update(SchoolRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
        try {
            DB::beginTransaction();
            if (auth()->user()->school->school_image == $request->file('school_image') || $request->file('school_image') == null) {
                $validated['school_image'] = $this->fileService->update('public/school_images', auth()->user()->school->school_image);
            } else {
                $validated['school_image'] = $this->fileService->update('public/school_images', auth()->user()->school->school_image, $request->file('school_image'));
            }
            School::where('user_id', auth()->user()->id)->update($validated);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Update school data is success!');
        } catch (\Exception$th) {
            DB::rollBack();
            return $th;
            return redirect()->route('profile')->with('error-query', 'Update school data is failed!');
        }
    }
}
