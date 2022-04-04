<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Str;

class Notify extends Component
{

    public function render()
    {
        $contact = Contact::orderBy('created_at' , 'desc')->latest()->take(3)->get();

        // foreach ($contact as $key => $value) {

        //    return $value->msg = Str::limit($value->msg , 53, '.....');
        // }
        

        return view('livewire.notify' , ['contact' => $contact]);
    }
}
