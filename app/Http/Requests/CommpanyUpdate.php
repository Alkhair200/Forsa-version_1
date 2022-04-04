<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommpanyUpdate extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name_commpany' => 'required',
            'email' => 'required|email',
            'about_commpany' => 'required',
        ];
    }
}
