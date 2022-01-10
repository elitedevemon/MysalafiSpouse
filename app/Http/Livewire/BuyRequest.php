<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BuyRequest extends Component
{
    public $qty;
    public $type;
    public $price;
    public $user;
    protected $queryString = ['qty', 'type', 'price'];
    public function  mount()
    {
        $this->user = Auth::user();
    }
    public function render()
    {
        return view('livewire.buy-request')->layout('layouts.site-master');
    }
}
