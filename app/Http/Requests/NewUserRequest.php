<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewUserRequest extends Request
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
            'name' => "",
            'username' => "required|unique:users,username",
            'email' => "required|unique:users,email",
            'password' => "required|min:6",
            'role' => "required|exists:roles,id"
        ];
    }
}
