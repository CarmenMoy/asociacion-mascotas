<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|min:3|max:10|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'description' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El apartado de nombre es obligatorio',
            'name.min' => 'El mínimo de caracteres permitidos para el nombre son 3',
            'name.max' => 'El máximo de caracteres permitidos para el nombre son 10',
            'name.regex' => 'Sólo se aceptan letras para el nombre',
            'description.required' => 'El apartado de descripción es obligatorio',
            'description.min' => 'El mínimo de caracteres permitidos para la descripción son 3',
            'description.max' => 'El máximo de caracteres permitidos para la descripción son 64',
            'description.regex' => 'Sólo se aceptan letras para la descripción',
        ];
    }
}