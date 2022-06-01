<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FaqRequest extends FormRequest
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
            'question' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'answer' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
        ];
    }

    public function messages()
    {
        return [
            'question.required' => 'El apartado de pregunta es obligatorio',
            'question.min' => 'El mínimo de caracteres permitidos son 3',
            'question.max' => 'El máximo de caracteres permitidos son 64',
            'question.regex' => 'Sólo se aceptan letras',
            'answer.required' => 'El apartado de respuesta es obligatorio',
            'answer.min' => 'El mínimo de caracteres permitidos son 3',
            'answer.max' => 'El máximo de caracteres permitidos son 64',
            'answer.regex' => 'Sólo se aceptan letras',
        ];
    }
}