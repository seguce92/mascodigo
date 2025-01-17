<?php

namespace App\Http\Requests\Learn;

use Illuminate\Foundation\Http\FormRequest;

class SkillStoreRequest extends FormRequest
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
            'slug'  =>  'required|min:2|max:255|unique:skills,slug',
            'icon'  =>  'required|min:100',
            'description'   =>  'required|min:50'
        ];
    }
}
