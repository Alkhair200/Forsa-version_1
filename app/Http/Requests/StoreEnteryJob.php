<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnteryJob extends FormRequest
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
            'full_name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required|max:20|min:10',
            'cv' => 'required|mimes:pdf',
            'description' => 'required',
        ];
    }
}
