<?php

namespace App\Http\Requests\Forum;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
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
            'slug'  =>  'unique:questions,slug',
            'content'   =>  'required|min:40|max:65535'
        ];
    }

    public function messages () {
        return [
            'title.required' =>  'El campo titulo es requerido',
            'title.min'     =>  'El titulo de la Discussion debe tener al menos :min caractares',  
            'title.max'     =>  'El titulo de la Discussion no debe pasar de :max caractares',
            'slug.unique'   =>  'Ya existe una discussion con el mismo nombre.',
            'content.min'   =>  'La Descripción / Contenido debe contener al menos :min caracteres',
            'content.max'   =>  'La Descripción / Contenido no debe pasar de :max caracteres',
            'content.required'   =>  'La Descripción / Contenido es requerido',
        ];
    }
}
