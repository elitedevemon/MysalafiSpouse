<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $user;
    public $email;
    public $name;
    public $current_password;
    public $new_password;
    public $confirm_password;
    public function render()
    {
        return view('livewire.user.change-password')->layout('layouts.site-master');
    }
    public function mount()
    {
        $this->user= Auth::user();
    }
    public function updatePassword()
    {
        $this->validate([
          
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);
      
        if(Hash::check($this->current_password, Auth::user()->password))
        {           
          $this->user->password = Hash::make($this->new_password);
          $this->user->update();
          session()->flash('message', 'Your password has been updated successfuly.');
          return;
        }
        else{
            $this->errorBag->add('current_password', 'Invalid password');
            return;
        }
    }
}
