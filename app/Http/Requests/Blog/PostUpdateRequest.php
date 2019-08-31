<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'slug'  =>  'required|min:3|max:255|unique:posts,slug,'.$this->route('post'),
            'content'       =>  'required',
            'description'   =>  'required|min:40|max:180',
            'image'         =>  'required',
            'is_publish'    =>  'required',
            'category_id'   =>  'required|numeric'
        ];
    }
}
