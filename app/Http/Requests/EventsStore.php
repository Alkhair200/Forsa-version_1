<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventsStore extends FormRequest
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
            'name' => 'required|min:3',
            'name_en' => 'required|min:3',
            'start_time' => 'required',
            'end_time' => 'required',
            'date' => 'required',
            'details' => 'required|min:10',
            'details_en' => 'required|min:10',
        ];
    }
}
