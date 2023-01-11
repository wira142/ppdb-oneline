<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name'=>'required|min:3',
            'image' => [Rule::requiredIf(function () {

                if (empty(User::where('id', auth()->user()->id)->first()->image)) {

                    return true;
                }

                return false;

            }), 'image', 'mimes:png,jpg,JPG,jpeg', 'max:2048'],
        ];
    }
}
