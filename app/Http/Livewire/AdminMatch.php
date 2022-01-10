<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminMatch extends Component
{
    public $filter;
    public function render()
    {
        return view('livewire.admin-match');
    }
}
