<?php

namespace App\Http\Livewire\User;

use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileView extends Component
{
    public $userID;
    public function mount()
    {
        $this->userID;
    }
    public function render()
    {
        // dd($this->userID);
        $user = User::where('id', $this->userID)->where('user_type', 'user')
        ->where('status','Active')
        ->where('visibility', 'Public')
        ->first();
       
        $guardian = RequestLog::where('user_id', Auth::user()->id)->where('r_user_id', $this->userID)
        ->where('status', 'accept')
        ->where('share', 1)->first();
        if($guardian){
            $guardian = $guardian;
        }else{
            $guardian = '';
        }
        return view('livewire.user.profile-view')->layout('layouts.site-master')
        ->with('user', $user)
        ->with('guardian', $guardian);
    }
}
