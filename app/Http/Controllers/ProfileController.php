<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Personal;
use App\Models\RegistrationForm;
use App\Models\School;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct(FileService $fileservice)
    {
        $this->fileService = $fileservice;
    }

    public function index()
    {
        $level = auth()->user()->level;
        if ($level == "student" || $level == "user") {
            $personal = auth()->user()->personal;
            $father = auth()->user()->father;
            $mother = auth()->user()->mother;
            $user = auth()->user();

            return view('user.user_profile', [
                'personal' => $personal,
                'father' => $father,
                'mother' => $mother,
                'user' => $user,
            ]);
        } else {
            $school = auth()->user()->school;
            return view('user.user_profile', [
                'school' => $school,
                'user' => auth()->user()
            ]);
        }
    }

    public function editProfile()
    {
        $data = auth()->user();
        return view('user.edit_profile', ['data' => $data]);
    }

    public function updateProfile(ProfileRequest $request)
    {
        $validated = $request->validated();
        // $validated['user_id'] = auth()->user()->id;
        try {
            DB::beginTransaction();
            if (auth()->user()->image == $request->file('image') || $request->file('image') == null) {
                $validated['image'] = $this->fileService->update('public/profile_images', auth()->user()->image);
            } else {
                $validated['image'] = $this->fileService->update('public/profile_images', auth()->user()->image, $request->file('image'));
            }
            User::where('id', auth()->user()->id)->update($validated);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Update school data is success!');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('profile')->with('error-query', 'Update school data is failed!');
        }
    }

    public function regisForm(RegistrationForm $form)
    {
        if (auth()->user()->personal == null) {
            return view('registration_form', ['page' => 'school']);
        } else {
            $personal = auth()->user()->personal;
            $father = auth()->user()->father;
            $mother = auth()->user()->mother;
            return view('user.show_personal_data', [
                'page' => 'school',
                'personal' => $personal,
                'father' => $father,
                'mother' => $mother,
                'form' => $form
            ]);
        }
    }
    public function editForm()
    {
        $personal = auth()->user()->personal;
        $father = auth()->user()->father;
        $mother = auth()->user()->mother;
        return view('update_registration_form', [
            'page' => 'school',
            'personal' => $personal,
            'father' => $father,
            'mother' => $mother,
        ]);
    }

    public function store(RegistrationRequest $request)
    {
        // $personal = $request->validated();
        $personal = $request->safe()->only(
            'nisn',
            'nik',
            'religion',
            'gender',
            'birthplace',
            'birthday',
            'phone',
            'address',
            'province',
            'city',
            'district',
            'village',
        );

        $father = [
            'status' => $request->father_status,
            'nik' => $request->father_nik,
            'name' => $request->father_name,
            'study' => $request->father_study,
            'job' => $request->father_job,
            'salary' => $request->father_salary,
            'phone' => $request->father_phone,
            'user_id' => auth()->user()->id,
        ];

        $mother = [
            'status' => $request->mother_status,
            'nik' => $request->mother_nik,
            'name' => $request->mother_name,
            'study' => $request->mother_study,
            'job' => $request->mother_job,
            'salary' => $request->mother_salary,
            'phone' => $request->mother_phone,
            'user_id' => auth()->user()->id,
        ];
        $personal['user_id'] = Auth::user()->id;
        try {
            DB::beginTransaction();
            Personal::create($personal);
            Father::create($father);
            Mother::create($mother);
            User::where('id', auth()->user()->id)->update(['level' => 'student']);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Add personal data is success!');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th;
            return redirect()->back()->with('query', $th)->withInput();
        }
    }
    public function update(RegistrationRequest $request)
    {
        // $personal = $request->validated();
        $personal = $request->safe()->only(
            'nisn',
            'nik',
            'religion',
            'gender',
            'birthplace',
            'birthday',
            'phone',
            'address',
            'province',
            'city',
            'district',
            'village',
        );
        $father = [
            'status' => $request->father_status,
            'nik' => $request->father_nik,
            'name' => $request->father_name,
            'study' => $request->father_study,
            'job' => $request->father_job,
            'salary' => $request->father_salary,
            'phone' => $request->father_phone,
            'user_id' => auth()->user()->id,
        ];

        $mother = [
            'status' => $request->mother_status,
            'nik' => $request->mother_nik,
            'name' => $request->mother_name,
            'study' => $request->mother_study,
            'job' => $request->mother_job,
            'salary' => $request->mother_salary,
            'phone' => $request->mother_phone,
            'user_id' => auth()->user()->id,
        ];

        try {
            $checkPersonal = auth()->user()->personal;
            DB::beginTransaction();
            Personal::where('user_id', auth()->user()->id)->update($personal);
            Father::where('user_id', auth()->user()->id)->update($father);
            Mother::where('user_id', auth()->user()->id)->update($mother);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Update personal data is success!');
        } catch (\Exception $th) {
            DB::rollBack();
            return $th;
            return redirect()->back()->with('query', $th)->withInput();
        }
    }

    public function destroy()
    {
        try {
            DB::beginTransaction();
            Personal::where('user_id', auth()->user()->id)->delete();
            Father::where('user_id', auth()->user()->id)->delete();
            Mother::where('user_id', auth()->user()->id)->delete();
            User::where('id', auth()->user()->id)->update(['level' => 'user']);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Delete private data is Success!');
        } catch (\Exception $th) {
            DB::rollBack();
            return redirect()->route('profile')->with('error-query', 'Delete private data is failed!');
        }
    }
}
