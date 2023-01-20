<?php

namespace App\Http\Requests;

use App\Models\RegistrationForm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PosterRequest extends FormRequest
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
            'title' => 'required|min:4',
            'time_expired' => 'required|after:yesterday',
            'degree' => 'required',
            'description' => 'required|min:10',
            'poster' => [Rule::requiredIf(function () {

                if (empty(RegistrationForm::where('school_id', auth()->user()->school->school_id)->first()->poster)) {

                    return true;
                }

                return false;
            }), 'image', 'mimes:png,jpg,JPG,jpeg', 'max:2048'],
        ];
    }
}
