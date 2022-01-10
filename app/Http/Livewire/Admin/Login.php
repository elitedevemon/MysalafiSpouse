<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $page = 'login';
    public $email;
    public $password;

    // public function mount()
    // {
    //     if(Auth::check() && Auth::user()->user_type != 'superadmin')
    //     {
    //         return redirect('/');
    //     }
    // }
    public function login()
    {
        
        $this->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            $user = Auth::user();
            if($user->user_type != 'superadmin'){
                $this->errorBag->add('credentials', 'this page only for super-admin');
                return;
            }
            return redirect('/superadmin/dashboard');
        }
        else {
            $this->errorBag->add('credentials', 'Invalid email or password');
        }

    }
    public function mount()
    {
        if(Auth::check() && Auth::user()->user_type == 'superadmin'){
            return redirect('/superadmin/dashboard');
        }
    }
    public function render()
    {
        return view('livewire.admin.login')->layout('layouts.fullwidth');
    }
}
