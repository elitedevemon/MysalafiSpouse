<?php

namespace App\Http\Livewire;

use App\Mail\Forgot;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Swift_TransportException;

class ForgotPassword extends Component
{
    public $email;
    public $screen = false;
    public function render()
    {
        return view('livewire.forgot-password')->layout('layouts.fullwidth');
    }
    public function forgot()
    {
        
        $this->validate([
            'email' => 'required|email'
        ]);
        $user = User::where('email', $this->email)->where('user_type', 'superadmin')->first();
        if($user){
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
            return redirect('reset/password?email='.$user->email);
            // ->session()->flash('message', 'we are send otp on your email account please verify');
        }else{
            session()->flash('error', 'Invalid email address');
        }

    }
}
