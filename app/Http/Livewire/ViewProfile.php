<?php

namespace App\Http\Livewire;

use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewProfile extends Component
{
    public $userID;
    public function mount()
    {
        // dd($this->$userID);
        $this->userID;
    }
    public function render()
    {
       dd($this->userID);
        $user = User::where('id', $this->userID)->where('user_type', 'user')
        ->where('status','Active')
        ->where('visibility', 'Public')
        ->first();
        $guardian = RequestLog::where('user_id', Auth::user()->id)->where('r_user_id', $this->userID)
        ->where('status', 'accept')
        ->where('share', 1)->firstOrFail();
        return view('livewire.view-profile')->layout('layouts.site-master')
        ->with('user', $user)
        ->with('guardian', $guardian);
    }
}
