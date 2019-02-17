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
        if ($this->dni_id === '1') {
            $rule = 'required|digits:10';
        } elseif ($this->dni_id === '2') {
            $rule = 'required|digits:13';
        }
        return [
            'codigo' => 'required|digits:10',
            'dni_id' => 'required',
            'numero' => $rule,
            'nombre' => 'required',
            'telefono' => 'nullable|numeric',
            'imagen' => 'nullable|file|image|mimes:jpeg|max:2048',
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
            'required' => ':attribute es requerido',
            'numeric' => ':attribute debe ser numerico',
            'digits' => ':attribute debe contener :digits digitos',
            'file' => ':attribute no es un archivo valido',
            'image' => ':attribute no es una imagen valida',
            'mimes' => ':attribute no es del tipo .jpg',
            'max' => ':attribute debe pesar maximo :max kilobytes',

        ];
    }


}
