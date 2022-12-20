<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //personal
            'nisn' => 'required|unique:personals|integer|digits:10',
            'nik' => 'required|unique:personals|integer|digits:16',
            'religion' => 'required|alpha',
            'gender' => 'required|alpha',
            'birthplace' => 'required|alpha',
            'birthday' => 'required|date_format:"Y-m-d"',
            'phone' => 'required|numeric|unique:personals|digits_between:10,14',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'address' => "required",
            'province' => "required",
            'city' => "required",
            'district' => "required",
            'village' => "required",

            // father
            'father_status' => 'required',
            'father_nik' => 'required|unique:fathers,nik|integer|digits:16',
            'father_name' => 'required',
            'father_study' => 'required',
            'father_job' => 'required',
            'father_salary' => 'required',
            'father_phone' => 'required|numeric|unique:fathers,phone|digits_between:10,14',

            // mother
            'mother_status' => 'required',
            'mother_nik' => 'required|unique:mothers,nik|integer|digits:16',
            'mother_name' => 'required',
            'mother_study' => 'required',
            'mother_job' => 'required',
            'mother_salary' => 'required',
            'mother_phone' => 'required|numeric|unique:mothers,phone|digits_between:10,14',
        ];
    }
}
