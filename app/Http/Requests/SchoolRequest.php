<?php

namespace App\Http\Requests;

use App\Models\School;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SchoolRequest extends FormRequest
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
            'name' => 'required|min:5',
            'address' => "required",
            'province' => "required",
            'city' => "required",
            'district' => "required",
            'village' => "required",
            'description' => "required",
            'school_image' => [Rule::requiredIf(function () {

                if (!empty(School::where('user_id', auth()->user()->id)->school_image)) {

                    return true;
                }

                return false;

            }), 'image', 'mimes:png,jpg,JPG,jpeg', 'max:2048'],
        ];
    }
}
