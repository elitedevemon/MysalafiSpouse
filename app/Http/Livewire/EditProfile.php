<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class EditProfile extends Component
{
    public $user;
    public $email;
    public $name;
    public $current_password;
    public $new_password;
    public $confirm_password;
    public function mount()
    {
        $this->user = Auth::user();
        $this->email = $this->user->email;
        $this->name = $this->user->name;
    }
    public function updatePassword()
    {
        $this->validate([
            'name' => 'required',
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
        $this->user->name = $this->name;
        if(Hash::check($this->current_password, $this->user->password))
        {           
          $this->user->password = Hash::make($this->new_password);
          $this->user->update();
          session()->flash('message', 'Data save successully.');
        }
        else{
            $this->errorBag->add('current_password', 'Invalid password');
        }
    }
    public function render()
    {
        return view('livewire.edit-profile');
    }
}
