<?php

namespace App\Http\Livewire\User;

use App\Models\Config;
use App\Models\PaymentMange;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddOn extends Component
{
    use WithFileUploads;
    public $qty= 1;
    public $total;
    public $profile_price;
    public $user;
    public $grandTotal;
    public  $interextraMatchRequest;
    public $payment_mode;
    public $config;
    public $mtn_no;
    public $evidence;
    
   
    public function mount()
    {
        $this->user= Auth::user();
        $this->config = Config::first();
        if(Auth::user()->type == 'International')
        {
            $this->total = $this->config->match_request_fee;
            $this->profile_price = $this->config->edit_profile_fee;
        }else{
            $this->total = $this->config->match_request_fee_euro;
            $this->profile_price = $this->config->edit_profile_fee_euro;
        }
    }
    public function manuaReq($peram){
        // dd($this->evidence);
        // $paymentMange = PaymentMange::where('req_id', $req_id)->where('user_id', Auth::user()->id)->first();
        // if($paymentMange){
        //     session()->flash('errormessage', 'You have already sent Cancel Match Request to MySalafiSpouse team.');
        //     return;
        // }
        $this->validate([
            'mtn_no' => $this->user->type == 'International' && $this->payment_mode == 'other' ? 'required' : '',
            // 'evidence' => 'image|max:1024',
        ]);
        PaymentMange::forceCreate([
            'qty' => 1,
            'amount' => $this->total,
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
    public function extraMatchRequest($requestPeram)
    {
        $this->qty = 1;
        if($this->interextraMatchRequest==3)
        {
            $this->grandTotal = $this->profile_price;
        }
        elseif($this->interextraMatchRequest==3 )
        {
            $this->grandTotal = $this->total;
        }
        if($requestPeram == 'internationalmatchRequest')
        {
            
            $this->interextraMatchRequest = 1;
        }
        elseif($requestPeram == 'extraMatchRequestbuy')
        {
            $this->interextraMatchRequest = 2;
        }
        elseif($requestPeram == 'profileEditbuy')
        {
         
            $this->interextraMatchRequest = 3;
        }
        if($requestPeram == 'closeinternationalmatchRequest')
        {
            $this->interextraMatchRequest = false;
        }
    }
    public function plusincreament()
    {
        $this->qty++;
        if($this->interextraMatchRequest == 3){
            $this->grandTotal= $this->qty*$this->profile_price;
        }else{
            $this->grandTotal= $this->qty*$this->total;
        }
    }
    public function minusincreament()
    {
        $this->qty--;
        if($this->qty < 1){
            $this->qty = 1;
        }
        $this->grandTotal= $this->qty*$this->total;
    }
    public function buynow()
    {
        // dd($this->payment_mode);
        if($this->payment_mode == 'stripe'&& $this->interextraMatchRequest == 1){
            return redirect('pay-now-with-stripe?qty='.$this->qty.'&price='.$this->total.'&type=1');
        }
        if($this->payment_mode == 'stripe'&& $this->interextraMatchRequest == 3){
            return redirect('pay-now-with-stripe?qty='.$this->qty.'&price='.$this->profile_price.'&type=3');
        }
        if($this->payment_mode == 'stripe'&& $this->interextraMatchRequest == 2){
            return redirect('pay-now-with-stripe?qty='.$this->qty.'&price='.$this->profile_price.'&type=2');
        }
        ///
        if($this->payment_mode == 'paypal'&& $this->interextraMatchRequest == 1){
        return redirect('pay-now-with-paypal?qty='.$this->qty.'&price='.$this->total.'&type=1');
        }
        if($this->payment_mode == 'paypal'&& $this->interextraMatchRequest == 3){
            return redirect('pay-now-with-paypal?qty='.$this->qty.'&price='.$this->profile_price.'&type=3');
        }
        if($this->payment_mode == 'paypal'&& $this->interextraMatchRequest == 2){
            return redirect('pay-now-with-paypal?qty='.$this->qty.'&price='.$this->profile_price.'&type=2');
        }
    }
    public function render()
    {
        return view('livewire.user.add-on')->layout('layouts.site-master');
    }
}
