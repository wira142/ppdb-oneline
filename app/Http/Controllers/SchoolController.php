<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Models\RegistrationForm;
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
        $schools = School::get();
        $province = json_decode(file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/provinsi'), true);

        foreach ($schools as $key => $school) {
            $school->province = $province['provinsi'][array_search($school->province, array_column($province['provinsi'], 'id'))]['nama'];

            $city = json_decode(file_get_contents('https://dev.farizdotid.com/api/daerahindonesia/kota/' . $school->city), true);

            $school->city = $city['nama'];
        }

        return view('schools_page', ['page' => 'school', 'schools' => $schools]);
    }
    public function show(School $id)
    {
        $forms = RegistrationForm::where('school_id', auth()->user()->school->school_id)->get();
        $forms = $this->fileService->getUrl('public/poster-images/', $forms, 'poster');
        return view('show_school', ['page' => 'school', 'school' => $id, 'forms' => $forms]);
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
        } catch (\Exception $th) {
            DB::rollBack();
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
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('profile')->with('error-query', 'Update school data is failed!');
        }
    }
    public function destroy()
    {
        $user_id = auth()->user()->id;
        $school_image = auth()->user()->school->school_image;
        try {
            DB::beginTransaction();
            School::where('user_id', $user_id)->delete();
            $this->fileService->delete('public/school_images', $school_image);
            User::where('id', $user_id)->update(['level' => 'user']);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Delete school data is success!');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('profile')->with('error-query', 'Delete school data is failed! ' . $th);
        }
    }
}
