<?php

namespace App\Http\Requests\Learn;

use Illuminate\Foundation\Http\FormRequest;

class LessonStoreRequest extends FormRequest
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
            'url'   =>  'required|url|min:10|max:155',
            'is_publish'    =>  'required',
            'is_private'    =>  'required',
            'duration'      =>  'required|date_format:H:i:s|min:8|max:8',
            'points'        =>  'required|numeric',
            'course_id'     =>  'required|numeric'
        ];
    }
}
