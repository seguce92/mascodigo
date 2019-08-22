<?php

namespace App\Http\Requests\Learn;

use Illuminate\Foundation\Http\FormRequest;

class SkillUpdateRequest extends FormRequest
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
            'name'  =>  'required|min:2|max:255',
            'slug'  =>  'required|min:2|max:255|unique:skills,slug,'.$this->route('skill'),
            'icon'  =>  'required|min:100',
            'description'   =>  'required|min:50'
        ];
    }
}
