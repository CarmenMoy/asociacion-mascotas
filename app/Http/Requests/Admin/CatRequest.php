<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CatRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'sex' => 'required',
            'category' => 'required|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'years' => 'required|regex:/^[0-9]+$/i',
            'description' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'vaccinated' => 'required',
            'sterilized' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El apartado de nombre es obligatorio',
            'name.regex' => 'Sólo se aceptan letras para el nombre',
            'sex.required' => 'El apartado de sexo es obligatorio',
            'category.required' => 'El apartado de categoría es obligatorio',
            'category.regex' => 'Sólo se aceptan letras',
            'years.required' => 'El apartado de años es obligatorio',
            'years.regex' => 'Sólo se aceptan números',
            'description.required' => 'El apartado de descripción es obligatorio',
            'description.min' => 'El mínimo de caracteres permitidos para la descripción son 3',
            'description.max' => 'El máximo de caracteres permitidos para la descripción son 64',
            'description.regex' => 'Sólo se aceptan letras para la descripción',
            'vaccinated.required' => 'El apartado de vacunas es obligatorio',
            'sterilized.required' => 'El apartado de castrado es obligatorio',
        ];
    }
}