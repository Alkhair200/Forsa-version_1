<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUser extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'new_password' => 'required|min:8',
            'old_password' => 'required',
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->id,
        ];
    }
}
