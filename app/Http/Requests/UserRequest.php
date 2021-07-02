<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                'name' => 'required|min:3|max:20',
                'username' => 'required|min:3|max:12',
                'slug' => 'required|min:3|max:20',
                'last_name' => 'required|min:3|max:20',
                'tipodocumento_id' => 'required|not_in:0',
                'cargo_id' => 'required|not_in:0',
                'departamento_id' => 'required|not_in:0',
                'cedula' => 'required|unique:users,cedula' . $this->user,
                'phone' => 'required',
                'email' => 'required|unique:users,email' . $this->user,
                'password' => 'required|confirmed|min:6'
        ];
    }
}
