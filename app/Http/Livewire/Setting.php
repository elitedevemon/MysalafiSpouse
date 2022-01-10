<?php

namespace App\Http\Livewire;

use App\Models\Config;
use App\Models\PaymentMange;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
class Setting extends Component
{
    use WithFileUploads;
    public $user;
    public $evidence;
    public $mtn_no;
    public $openModel;
    public $openModelDeactive;
    public $payment_mode;
    public $config;
    // public $email;
    public function openModelDeactiveFun()
    {
        $this->openModelDeactive = true;
    }
    public function openModelFun()
    {
        $this->openModel = true;
    }
    public function manuaReq($req_id, $peram){
        // dd($this->evidence);
        $paymentMange = PaymentMange::where('paid_against', $peram)->where('user_id', Auth::user()->id)
        ->where('payment_status', "Unpaid")
        ->first();
        if($paymentMange){
            session()->flash('errormessage', 'You have already sent Cancel Match Request to  MySalafiSpouse team.');
            return;
        }
        $this->validate([
            'mtn_no' => $this->user->type == 'International' && $this->payment_mode == 'other' ? 'required' : '',
            // 'evidence' => 'image|max:1024',
        ]);
        PaymentMange::forceCreate([
            'qty' => 1,
            'amount' =>1,
            // 'req_id' =>$req_id,
            'user_id' => $this->user->id,
            'currency' => Auth::user()->type == 'International' ? 'usd' : 'gbp',
            'paid_against' => $peram,
            'payment_status' => 'Unpaid',
            'payment_method' => $this->payment_mode,
            'mtn_no' => $this->user->type == 'International' ? $this->mtn_no :  '',
            'evidence' =>  $this->evidence ? $this->evidence->store('public')  : ''
        ]);
        session()->flash('message', 'Your payment is currently processing. We will get back to you shortly with a payment confirmation email.');
       
    }
    public function closemodel()
    {
        $this->openModel = false;
        $this->openModelDeactive = false;
    }
    public function mount()
    {
        
        $this->user =  Auth::user();
        $this->config = Config::first();
    }
    public function render()
    {
        return view('livewire.setting')->layout('layouts.site-master');
    }
}
