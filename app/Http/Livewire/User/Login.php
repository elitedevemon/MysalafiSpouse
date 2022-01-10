<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
   
    public $email;
    public $password;
    public function login()
    {
        // dd('asd');
        $this->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('profile_code', $this->email)->where('status', 'Active')
            ->where('user_type', '!=', 'superadmin')
            ->where('deleted',  null)
            ->first();
            if($user){
                if(Auth::attempt(['profile_code' => $this->email, 'password' => $this->password])){
                    $user = Auth::user();
                    $usr = User::where('id',$user->id)->first();
                    $usr->deactive = null;
                    $usr->update();
                    return redirect('dashboard');
                }
                else {
                    $this->errorBag->add('credentials', 'Invalid profile code or password');
                }
            }
            else {
                $this->errorBag->add('credentials', 'User not found');
            }
        }
        else{
            $user = User::where('email', $this->email)->where('status', 'Active')
            ->where('deleted',null)
            ->where('user_type', '!=', 'superadmin')->first();
            if($user){
                if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
                    $user = Auth::user();
                    $usr = User::where('id',$user->id)->first();
                    $usr->deactive = null;
                    $usr->update();
                    return redirect('dashboard');
                }
                else {
                    $this->errorBag->add('credentials', 'Invalid email or password');
                }
            }
            else {
                $this->errorBag->add('credentials', 'User not found');
            }
        }
        

    }
    public function mount()
    {
        if(Auth::check() && Auth::user()->user_type == 'superadmin'){
            return redirect('/superadmin/dashboard');
        }
        if(Auth::check() && Auth::user()->user_type == 'user'){
            return redirect('dashboard');
        }
    }
    public function render()
    {
        return view('livewire.user.login')->layout('layouts.site-master');
    }
}
