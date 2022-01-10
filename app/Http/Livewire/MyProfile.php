<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyProfile extends Component
{
    public $user;
    public function mount()
    {
        $this->user = Auth::user();
    }
    public function render()
    {
        return view('livewire.my-profile')->layout('layouts.site-master');
    }
}
