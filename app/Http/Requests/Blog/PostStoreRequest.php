<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'slug'  =>  'required|min:3|max:255|unique:posts,slug',
            'content'   =>  'required',
            'image'     =>  'required',
            'is_publish'    =>  'required',
            'category_id'   =>  'required|numeric'
        ];
    }
}