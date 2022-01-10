<?php

namespace App\Http\Livewire;

use App\Models\WantToSignup;
use Livewire\Component;

class SignupView extends Component
{
    public $sid;
 
    protected $queryString = ['sid'];
    
    public function mount()
    {
        $this->sid;
    }
    public function render()
    {
        // dd($this->sid);
        $user = WantToSignup::where('id', $this->sid)->first();
        return view('livewire.signup-view')
        ->with('user', $user);
    }
}
