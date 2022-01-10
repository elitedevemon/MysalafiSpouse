<?php

namespace App\Http\Livewire\User;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class VerifyForgotPassword extends Component
{
    public $email;
    public $otp;
    public $password;
    public $password_confirmation;

    protected $queryString = ['email'];
    public function mount()
    {
        if(Auth::check())
        {
            return redirect('dashboard');
        }
    }
    public function resetPassword()
    {
        $this->validate([
            'password' => 'required|confirmed|min:6',
            'otp' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::where('email', $this->email)->first();
        $otp = Otp::where('user_id', $user->id)->where('code', $this->otp)->where('type', 'password-reset')->first();
        if($otp){
            $user->password = Hash::make($this->password);
            $user->update();
            $otp->delete();
            session()->flash('resetmessage', 'Your password has been reset successfully.');
            return redirect('login');
        }
        else {
            $this->errorBag->add('otp', 'Invalid otp code provided');
        }
    }
    public function render()
    {
        return view('livewire.user.verify-forgot-password')->layout('layouts.site-master');
    }
}
