<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseStore extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => 'required',
            'name_en' => 'required',
            'start_date' => 'required',
            'image' => 'required|',
            'description' => 'required',
            'description_en' => 'required',
            'price' => 'required|numeric',
        ];
    }
}
