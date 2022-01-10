<?php

namespace App\Http\Livewire;

use App\Models\EmailLog;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Notification extends Component
{
    public $emails;
    public function mount()
    {
        $this->emails=EmailLog::where('user_id', Auth::user()->id)
        ->orderBy('id', 'desc')
        ->get();
    }
    public function render()
    {
        
        return view('livewire.notification')->layout('layouts.site-master');
    }
}
