<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Config;
use App\Models\PaymentMange;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
class LockProfile extends Component
{
    use WithFileUploads;
    public $type;
    public $config;
    public  $fee;
    public $user;
    public $mtn_no;
    public $paymentchk;
    public $evidence;
    public function mount()
    {
       
        $this->user = Auth::user();
        $this->config = Config::first();
        $this->fee = Auth::user()->type == 'International' ? $this->config->anual_fee : $this->config->anual_fee_euro;
    }
   

    public function manuaReq($peram){
        // dd($this->evidence);
       
        $this->validate([
            'mtn_no' => $this->user->type == 'International' && $this->type == 'other' ? 'required' : '',
            // 'evidence' => 'image|max:1024',
        ]);
        PaymentMange::forceCreate([
            'qty' => 1,
            'amount' =>$this->fee,
           
            'user_id' => $this->user->id,
            'currency' => Auth::user()->type == 'International' ? 'usd' : 'gbp',
            'paid_against' => $peram,
            'payment_status' => 'Unpaid',
            'payment_method' => $this->type,
            'mtn_no' => $this->user->type == 'International' ? $this->mtn_no :  '',
            'evidence' =>  $this->evidence ? $this->evidence->store('public')  : ''
        ]);
        session()->flash('message', 'Your payment is currently processing. We will get back to you shortly with a payment confirmation email.');
       
    }
    public function render()
    {
        return view('livewire.lock-profile')->layout('layouts.site-master');
    }
}
