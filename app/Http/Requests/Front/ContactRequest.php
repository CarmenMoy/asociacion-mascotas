<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'lastname' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'telephone' => 'required|min:7|max:15|regex:/^[0-9\s]+$/i',
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($this->id)],
            'comment' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El mínimo de caracteres permitidos para el nombre son 3',
            'name.max' => 'El máximo de caracteres permitidos para el nombre son 64',
            'name.regex' => 'Sólo se aceptan letras para el nombre',
            'lastname.required' => 'El apellido es obligatorio',
            'lastname.min' => 'El mínimo de caracteres permitidos para el apellido son 3',
            'lastname.max' => 'El máximo de caracteres permitidos para el apellido son 64',
            'lastname.regex' => 'Sólo se aceptan letras para el apellido',
            'telephone.required' => 'El teléfono es obligatorio',
            'telephone.min' => 'El mínimo de caracteres permitidos para el teléfono son 7',
            'telephone.max' => 'El máximo de caracteres permitidos para el teléfono son 15',
            'telephone.regex' => 'Sólo se aceptan números para el teléfono',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El formato de email es incorrecto',
            'email.max' => 'El máximo de caracteres permitidos para el email son 255',
            'email.unique' => 'El email ya existe',
            'comment.required' => 'La dirección es obligatoria',
            'comment.min' => 'El mínimo de caracteres permitidos para la dirección son 3',
            'comment.max' => 'El máximo de caracteres permitidos para la dirección son 64',
            'comment.regex' => 'Sólo se aceptan letras para la dirección',
        ];
    }
}