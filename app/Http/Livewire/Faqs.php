<?php

namespace App\Http\Livewire;

use App\Models\Faqs as ModelsFaqs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Faqs extends Component
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
        $faqs = ModelsFaqs::where('active', 1)->get();
        
        return view('livewire.faqs')->layout('layouts.site-master')->with('faqs', $faqs);
    }
}
