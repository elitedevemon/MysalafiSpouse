<?php

namespace App\Http\Livewire;

use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email;
    public $otp;
    public $password;
    public $password_confirmation;

    protected $queryString = ['email'];

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
            session()->flash('resetmessage', 'Your password has been updated successfully');
            return redirect('superadmin/login');
        }
        else {
            $this->errorBag->add('otp', 'Invalid otp code provided');
        }
    }
    public function render()
    {
        return view('livewire.reset-password')->layout('layouts.fullwidth');
    }
}
