<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadoRequest extends FormRequest
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
            'nombres' => 'required|min:3|max:20',
            'slug' => 'required|min:3|max:20',
            'apellidos' => 'required|min:3|max:20',
            'tipodocumento_id' => 'required|not_in:0',
            'departamento_id' => 'required|not_in:0',
            'cargo_id' => 'required',
            'cedula' => 'required|max:9|unique:empleados,cedula' . $this->empleado,
            'celular' => 'required|max:14',
            'email' => 'required|unique:empleados,email' . $this->empleado,
        ];
    }
}
