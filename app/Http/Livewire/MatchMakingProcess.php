<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MatchMakingProcess extends Component
{
    public function mount()
    {
        if(Auth::check())
        {
            return redirect('dashboard');
        }
    }
    public function render()
    {
        return view('livewire.match-making-process')->layout('layouts.site-master');
    }
}
