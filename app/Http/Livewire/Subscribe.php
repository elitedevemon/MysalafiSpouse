<?php

namespace App\Http\Livewire;

use App\Models\Subscribe as ModelsSubscribe;
use Livewire\Component;

class Subscribe extends Component
{
    public $name;
    public $email;
    public function render()
    {
        return view('livewire.subscribe');
    }
    public function store()
    {
       $this->validate([
           'name' => 'required',
           'email' => 'required|email|unique:subscribes,email',
       ]);
       ModelsSubscribe::forceCreate([
           'name' => $this->name,
           'email' => $this->email,
       ]);
       $this->name = '';
       $this->email = '';
       session()->flash('message', 'SUBSCRIBE SUCCESSFULLY.');
    }
}
