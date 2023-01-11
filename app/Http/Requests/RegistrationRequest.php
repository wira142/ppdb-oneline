<?php

namespace App\Http\Requests;

use App\Models\Personal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'nisn' => ['required', 'numeric', 'digits:10',
                Rule::unique('personals', 'nisn')->ignore($this->user()->id, 'user_id')],
            'nik' => ['required', 'integer', 'digits:16', Rule::unique('personals', 'nik')->ignore($this->user()->id, 'user_id')],
            'religion' => 'required|alpha',
            'gender' => 'required|alpha',
            'birthplace' => 'required|alpha',
            'birthday' => 'required|date_format:"Y-m-d"',
            'phone' => ['required', 'numeric', 'digits_between:10,14', Rule::unique('personals', 'phone')->ignore($this->user()->id, 'user_id')],
            'address' => "required",
            'province' => "required",
            'city' => "required",
            'district' => "required",
            'village' => "required",

            // father
            'father_status' => 'required',
            'father_nik' => ['required', Rule::unique('fathers', 'nik')->ignore($this->user()->id, 'user_id'), 'integer', 'digits:16'],
            'father_name' => 'required',
            'father_study' => 'required',
            'father_job' => 'required',
            'father_salary' => 'required',
            'father_phone' => ['required', 'numeric', Rule::unique('fathers', 'phone')->ignore($this->user()->id, 'user_id'), 'digits_between:10,14'],

            // mother
            'mother_status' => 'required',
            'mother_nik' => ['required', Rule::unique('mothers', 'nik')->ignore($this->user()->id, 'user_id'), 'integer', 'digits:16'],
            'mother_name' => 'required',
            'mother_study' => 'required',
            'mother_job' => 'required',
            'mother_salary' => 'required',
            'mother_phone' => ['required', 'numeric', Rule::unique('mothers', 'phone')->ignore($this->user()->id, 'user_id'), 'digits_between:10,14'],
        ];
    }
}
