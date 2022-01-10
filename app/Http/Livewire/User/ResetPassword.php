<?php

namespace App\Http\Livewire\User;

use App\Mail\Forgot;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email;
    public function mount()
    {
        if(Auth::check())
        {
            return redirect('dashboard');
        }
    }
    public function sednEmail()
    {
        $this->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $this->email)->where('user_type', 'user')->first();
        if(!$user){
            $this->errorBag->add('email', 'Email not found');
            return;
        }
        else
        {
            $otp = rand(10000, 99999);
            $data = [
                'otp' => $otp
            ];
            Mail::to($user)->send(new Forgot($data));
            Otp::where('user_id', $user->id)->delete();
            Otp::forceCreate([
                'user_id' => $user->id,
                'type' => 'password-reset',
                'code' => $otp
            ]);
            session()->flash('message', 'We have sent a password reset code to your email. Kindly confirm your code below.');
            return redirect('user-reset-password?email='.$user->email);
        }
    }
    public function render()
    {
        return view('livewire.user.reset-password')->layout('layouts.site-master');
    }
}
