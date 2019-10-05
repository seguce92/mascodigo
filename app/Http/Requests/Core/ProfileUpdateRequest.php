<?php

namespace App\Http\Requests\Core;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username'  =>  'required|min:5|max:25|unique:users,username,'.$this->route('user'),
            'email'     =>  'required|min:5|max:100|unique:users,email,'.$this->route('user'),
            'fullname'  =>  'required|min:3|max:150',
            'photo'     =>  'max:255'
        ];
    }
}
