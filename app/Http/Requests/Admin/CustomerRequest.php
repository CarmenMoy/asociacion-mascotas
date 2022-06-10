<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CustomerRequest extends FormRequest
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
            'direction' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'country' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'city' => 'required|min:3|max:64|regex:/^[a-z0-9áéíóúàèìòùäëïöüñ\s]+$/i',
            'cp' => 'required|min:5|max:5|regex:/^[0-9\s]+$/i',
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
            'direction.required' => 'La dirección es obligatoria',
            'direction.min' => 'El mínimo de caracteres permitidos para la dirección son 3',
            'direction.max' => 'El máximo de caracteres permitidos para la dirección son 64',
            'direction.regex' => 'Sólo se aceptan letras para la dirección',
            'country.required' => 'El país es obligatorio',
            'country.min' => 'El mínimo de caracteres permitidos para el país son 3',
            'country.max' => 'El máximo de caracteres permitidos para el país son 64',
            'country.regex' => 'Sólo se aceptan letras para el país',
            'city.required' => 'La ciudad es obligatoria',
            'city.min' => 'El mínimo de caracteres permitidos para la ciudad son 3',
            'city.max' => 'El máximo de caracteres permitidos para la ciudad son 64',
            'city.regex' => 'Sólo se aceptan letras para la ciudad',
            'cp.required' => 'El código postal es obligatorio',
            'cp.min' => 'El mínimo de caracteres permitidos para el código postal son 5',
            'cp.max' => 'El máximo de caracteres permitidos para el código postal son 5',
            'cp.regex' => 'Sólo se aceptan números para el código postal',
        ];
    }
}