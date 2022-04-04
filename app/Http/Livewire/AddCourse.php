<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class AddCourse extends Component
{

    public $name, $msg,$subject,$email,$currentStep;

    public function updated($properName)
    {
        $this->validateOnly($properName,[
            'name' => 'required|string|max:30',
            'email' => 'required|email|max:50',
            'subject' => 'required|max:50',
            'msg' => 'required|max:100',
        ]);
    }

    // public function render()
    // {
    //     return view('livewire.add-course');
    // }

    public function submitData()
    {
        try {
            
        $validaeData = $this->validate([
            'name' => 'required|string|max:20',
            'email' => 'required|email|max:50',
            'subject' => 'required|max:50',
            'msg' => 'required|max:100',
        ]);
            
            $contact = new Contact();

            $contact->name = $this->name;
            $contact->msg = $this->msg;
            $contact->subject = $this->subject;
            $contact->email = $this->email;
            $contact->save();
    
            $name = "";
            $msg = "";
            $subject = "";
            $email = "";
    
            session()->flash('message', 'send successfully.');
    
            return redirect()->route('index');

        } catch (\Exception $ex) {
            
            $this->catchError = $ex->getMessage();
             
        }

    }

}
