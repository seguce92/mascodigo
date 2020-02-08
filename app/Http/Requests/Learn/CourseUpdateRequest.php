<?php

namespace App\Http\Requests\Learn;

use Illuminate\Foundation\Http\FormRequest;

class CourseUpdateRequest extends FormRequest
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
            'title' =>  'required|min:3|max:255',
            'slug'  =>  'required|min:3|max:255|unique:courses,slug,'.$this->route('course'),
            'content'   =>  'required',
            'image'  =>  'required',
            'color' =>  'required',
            'is_publish'    =>  'required',
            'level' =>  'required',
            'skill_id'  =>  'required|numeric'
        ];
    }
}
