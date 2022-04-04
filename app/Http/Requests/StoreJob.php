<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJob extends FormRequest
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

    public function rules()
    {
        return [
            'type_job' => 'required',
            'location' => 'required',
            'type_time' => 'required',
            'amount' => 'required|numeric',
            'description' => 'required',
            'name_commpany' => 'required|max:20',
            'email' => 'required|email',
            'about_commpany' => 'required|min:20',
        ];
    }
}
