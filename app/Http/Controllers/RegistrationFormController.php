<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\Father;
use App\Models\Mother;
use App\Models\Personal;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RegistrationFormController extends Controller
{
    public function __construct(FileService $fileservice)
    {
        $this->fileService = $fileservice;
    }

    public function regisForm()
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
            'image',
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
            $personal['image'] = $this->fileService->store('public/personal_images', $request->file('image'));
            Personal::create($personal);
            Father::create($father);
            Mother::create($mother);
            User::where('id', auth()->user()->id)->update(['level' => 'student']);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Add personal data is success!');
        } catch (\Exception$th) {
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
            if ($checkPersonal->image == $request->file('image') || $request->file('image') == null) {
                $personal['image'] = $this->fileService->update('public/personal_images', $checkPersonal->image);
            } else {
                $personal['image'] = $this->fileService->update('public/personal_images', $checkPersonal->image, $request->file('image'));
            }
            Personal::where('user_id', auth()->user()->id)->update($personal);
            Father::where('user_id', auth()->user()->id)->update($father);
            Mother::where('user_id', auth()->user()->id)->update($mother);
            DB::commit();
            return redirect()->route('profile')->with('query', 'Update personal data is success!');
        } catch (\Exception$th) {
            DB::rollBack();
            return $th;
            return redirect()->back()->with('query', $th)->withInput();
        }

    }
}
