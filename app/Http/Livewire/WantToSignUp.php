<?php

namespace App\Http\Livewire;

use App\Mail\WantToSignUp as MailWantToSignUp;
use App\Models\WantToSignup as ModelsWantToSignup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class WantToSignUp extends Component
{
    public $gender;
    public $email;
    public $scholar;
    public $ethnicity_residence;
    public $age_height;
    public $background;
    public $potential;
    public $before_married;
    public $other_scholar;
    public $chk = false;
    public $msg = false;
    public function mount()
    {
        if(Auth::check())
        {
            return redirect('dashboard');
        }
    }
    public function store()
    {
    //    dd();
       $this->validate([
           'gender' => 'required',
           'email' => 'required',
           'ethnicity_residence' => 'required',
           'age_height' => 'required',
           'background' => 'required',
           'potential' => 'required',
           'before_married' => 'required',
           'other_scholar' => $this->chk ?  'required' : 'nullable',
       ]);
       $data = ModelsWantToSignup::forceCreate([
           'email' => $this->email,
           'gender' => $this->gender,
          
           'scholar' => $this->scholar,
           'ethnicity_residence' => $this->ethnicity_residence,
           'age_height' => $this->age_height,
           'background' => $this->background,
           'potential' => $this->potential,
           'before_married' => $this->before_married,
           'other_scholar' => $this->other_scholar,
           'ip_address' => request()->ip() . date('M-d-Y h:i:A'),
           
       ]);
       Mail::to('mysalafispouse@gmail.com')
       ->send(new MailWantToSignUp(['data' => $data]));
    //    Mail::to($data->email)->send(new MailWantToSignUp(['data' => $data]));
       $this->msg='true';
       $this->age_height = '';
       $this->email = '';
       $this->ethnicity_residence = '';
       $this->background = '';
       $this->other_scholar = '';
       $this->before_married = '';
       $this->potential = '';
    }
    public function render()
    {
        return view('livewire.want-to-sign-up')->layout('layouts.site-master');
    }
}
