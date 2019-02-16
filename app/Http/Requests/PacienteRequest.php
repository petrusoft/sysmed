<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
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
        $rule='';

        if ($this->dni_id === 1) {
            $rule = 'required|digits:10';
        } elseif ($this->dni_id === 2) {
            $rule = 'required|digits:13';
        }

        return [
            'codigo' => 'required|numeric',
            'dni_id' => 'required',
            'numero' => $rule,
            'nombre' => 'required',
            'telefono' => 'required|numeric',
            'imagen' => 'required|file|image|mimes:jpeg',
        ];
    }

    /**
     * Override the built-in messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'codigo.required' => 'codigo es requerido',
            'codigo.numeric' => 'codigo debe ser numerico',
            'dni_id.required' => 'documento es requerido',
            'numero.required' => 'numero es requerido',
            'numero.digits' => 'cedula debe contener :digits digitos',
            'telefono.required' => 'telefono es requerido',
            'telefono.numeric' => 'telefono debe ser numerico',
        ];
    }


}
