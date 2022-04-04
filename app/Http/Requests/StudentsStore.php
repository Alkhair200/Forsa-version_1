<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsStore extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100|min:3',
            'name_en' => 'required|max:100|min:3',
            'course_id' => 'required',
            'phone' => 'required|max:50',
        ];
    }
}
