<?php

namespace App\Http\Livewire;

// use App\Http\Livewire\Table\Reviews;
use App\Models\AboutUs;
use App\Models\Config as ModelsConfig;
use App\Models\Faqs;
use App\Models\Review;
use Livewire\Component;

class Config extends Component
{
    // public $reviewDataTable = new Reviews();
    public $email_match_request = false;
    public $email_decision_request = false;
    public $stripe_client_id;
    public $stripe_secret_key;
    public $paypal_client_id;
    public $paypal_secret_key;
    public $match_request_fee;
    public $match_request_fee_euro;
    public $match_cacnel_fee;
    public $match_cacnel_fee_euro;
    public $edit_profile_fee;
    public $edit_profile_fee_euro;
    public $anual_fee;
    public $deactive_fee;
    public $deactive_fee_pound;
    public $anual_fee_euro;
    public $bank_western;
    public $bracnh_name;
    public $iban;
    public $instagram_client_id;
    public $instagram_secret_key;
    public $config;
    public function render()
    {
        return view('livewire.config');
    }
    public function mount()
    {
        $this->config = ModelsConfig::first();
        if($this->config)
        {
            $this->email_match_request  = $this->config->email_match_request;
            $this->email_decision_request  = $this->config->email_decision_request;
            $this->stripe_client_id  = $this->config->stripe_client_id;
            $this->stripe_secret_key  = $this->config->stripe_secret_key;
            $this->paypal_client_id  = $this->config->paypal_client_id;
            $this->paypal_secret_key  = $this->config->paypal_secret_key;
            $this->match_request_fee  = $this->config->match_request_fee;
            $this->match_request_fee_euro  = $this->config->match_request_fee_euro;
            $this->match_cacnel_fee  = $this->config->match_cacnel_fee;
            $this->match_cacnel_fee_euro  = $this->config->match_cacnel_fee_euro;
            $this->deactive_fee  = $this->config->deactive_fee;
            $this->deactive_fee_pound  = $this->config->deactive_fee_pound;
            $this->edit_profile_fee  = $this->config->edit_profile_fee;
            $this->edit_profile_fee_euro  = $this->config->edit_profile_fee_euro;
            $this->anual_fee  = $this->config->anual_fee;
            $this->anual_fee_euro  = $this->config->anual_fee_euro;
            $this->bank_western  = $this->config->bank_western;
            $this->bracnh_name  = $this->config->bracnh_name;
            $this->iban  = $this->config->iban;
            $this->instagram_client_id  = $this->config->instagram_client_id;
            $this->instagram_secret_key  = $this->config->instagram_secret_key;
        }
    }
    public function emailConfig()
    {
        if($this->config){
            $this->config->email_match_request = $this->email_match_request;
            $this->config->email_decision_request = $this->email_decision_request;
            $this->config->update();
        }else{
            ModelsConfig::forceCreate([
                'email_match_request' => $this->email_match_request,
                'email_decision_request' => $this->email_decision_request,
            ]);
        }
    }

    public function payment()
    {
        $this->validate([
            'stripe_client_id' => 'required',
            'stripe_secret_key' => 'required',
            'paypal_client_id' => 'required',
            'paypal_secret_key' => 'required',
            'bank_western' => 'required',
            'bracnh_name' => 'required',
            'iban' => 'required',
            'instagram_client_id' => 'required',
            'instagram_secret_key' => 'required',
          
         
        ]);
        if($this->config){
            $this->config->stripe_client_id = $this->stripe_client_id;
            $this->config->stripe_secret_key = $this->stripe_secret_key;
            $this->config->paypal_client_id = $this->paypal_client_id;
            $this->config->paypal_secret_key = $this->paypal_secret_key;
            $this->config->bank_western = $this->bank_western;
            $this->config->bracnh_name = $this->bracnh_name;
            $this->config->iban = $this->iban;
            $this->config->instagram_client_id = $this->instagram_client_id;
            $this->config->instagram_secret_key = $this->instagram_secret_key;
            $this->config->update();
        }else{
            ModelsConfig::forceCreate([
                'stripe_client_id' => $this->stripe_client_id,
                'stripe_secret_key' => $this->stripe_secret_key,
                'paypal_client_id' => $this->paypal_client_id,
                'paypal_secret_key' => $this->paypal_secret_key,
                'bank_western' => $this->bank_western,
                'bracnh_name' => $this->bracnh_name,
                'iban' => $this->iban,
                'instagram_client_id' => $this->instagram_client_id,
                'instagram_secret_key' => $this->instagram_secret_key,
            ]);
        }
        session()->flash('message', 'Data save successfully.');
    }
    public function package()
    {
        $this->validate([
            'match_request_fee' => 'required|integer',
            'match_request_fee_euro' => 'required|integer',
            'match_cacnel_fee' => 'required|integer',
            'match_cacnel_fee_euro' => 'required|integer',
            'deactive_fee' => 'required|integer',
            'deactive_fee_pound' => 'required|integer',
            'edit_profile_fee' => 'required|integer',
            'edit_profile_fee_euro' => 'required|integer',
            'anual_fee' => 'required|integer',
            'anual_fee_euro' => 'required|integer',
        ]);
        if($this->config){
            $this->config->match_request_fee=$this->match_request_fee ;
            $this->config->match_request_fee_euro=$this->match_request_fee_euro ;
            $this->config->match_cacnel_fee= $this->match_cacnel_fee;
            $this->config->match_cacnel_fee_euro= $this->match_cacnel_fee_euro;
            $this->config->deactive_fee= $this->deactive_fee;
            $this->config->deactive_fee_pound= $this->deactive_fee_pound;
            $this->config->edit_profile_fee= $this->edit_profile_fee;
            $this->config->edit_profile_fee_euro= $this->edit_profile_fee_euro;
            $this->config->anual_fee= $this->anual_fee;
            $this->config->anual_fee_euro= $this->anual_fee_euro;
            $this->config->update();
        }else{
            ModelsConfig::forceCreate([
                'match_request_fee' => $this->match_request_fee,
                'match_request_fee_euro' => $this->match_request_fee_euro,
                'match_cacnel_fee' => $this->match_cacnel_fee,
                'match_cacnel_fee_euro' => $this->match_cacnel_fee_euro,
                'deactive_fee' => $this->deactive_fee,
                'deactive_fee_pound' => $this->deactive_fee_pound,
                'edit_profile_fee' => $this->edit_profile_fee,
                'edit_profile_fee_euro' => $this->edit_profile_fee_euro,
                'anual_fee' => $this->anual_fee,
                'anual_fee_euro' => $this->anual_fee_euro,
            ]);
        }
        session()->flash('message', 'Package save successfully.');
    }
    
}
