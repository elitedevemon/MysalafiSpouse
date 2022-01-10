<?php

namespace App\Http\Livewire;

use App\Models\Balance;
use App\Models\UpdateUser;
use App\Models\User;
use App\Models\UserScholar;
use App\Models\UserUpdateDetail;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileEdit extends Component
{
    public $user;
    public $email;
    public $profile_code;
    public $dob;
    public $residence;
    public $type;
    public $ethnicity;
    public $age;
    public $height;
    public $about;
    // public $guardian;
    public $potential_spouse;
    public $other_scholars;
    public $scholar = [];
    public $any_other_information;
    public $guardian;
    public $balance;
    public $balanceTotal;
    public $chk = false;
    public $openModel;
   
    public function mount()
    {
        
        $this->balanceTotal = Balance::where('type','Profile edit')->where('user_id', Auth::user()->id)
        ->where('qty', '>', 0)
        ->sum('qty');
        $this->scholar=UserScholar::where('user_id', Auth::user()->id)->pluck('name');
        // dd($this->scholars);
        $this->email = Auth::user()->email;
        $this->profile_code = Auth::user()->profile_code;
        $this->dob = Auth::user()->dob;
        $this->residence = Auth::user()->residence;
        $this->type = Auth::user()->type;
        $this->ethnicity = Auth::user()->ethnicity;
        $this->age = Auth::user()->age;
        $this->height = Auth::user()->height;
        $this->about = Auth::user()->about;
        $this->potential_spouse = Auth::user()->potential_spouse;
        $this->other_scholars = Auth::user()->other_scholars;
        $this->any_other_information = Auth::user()->any_other_information;
        $this->guardian = Auth::user()->guardian;
        
    }
    public function render()
    {
        return view('livewire.profile-edit')->layout('layouts.site-master');
    }
    public function closeModel()
    {
        $this->openModel=false;
    }
    public function confirmUpdate()
    {
       
        $balance = Balance::where('type','Profile edit')->where('user_id', Auth::user()->id)
        ->where('qty', '>', 0)
        ->first();
        if(!$balance)
        {
            session()->flash('message', 'Sorrt you dont have profile edit request.');
            return;
        }
        else
        {
            // dd('das');
            $user = new UpdateUser();
            // dd($user);
            // $user->dob= $this->dob;
            $user->residence= $this->residence;
            // $user->type= $this->type;
            $user->ethnicity= $this->ethnicity;
            $user->age= $this->age;
            $user->height= $this->height;
            $user->about= $this->about;
            $user->potential_spouse= $this->potential_spouse;
            $user->scholars= $this->other_scholars;
            $user->any_other_information= $this->any_other_information;
            $user->user_id = Auth::user()->id;
            $user->guardian= $this->guardian;
            $user->save();
            if(isset($this->scholar))
            {
                foreach($this->scholar as $item)
                {
                    UserUpdateDetail::forceCreate([
                        'user_update_id' => $user->id,
                        'name' => $item,
                        'user_id' => Auth::user()->id,
                    ]);
                }
            }
            $balance->qty = $balance->qty - 1;
            $balance->update();
            session()->flash('message', 'Your request has been received admin will be approve ASAP thank you.');
            return;
            // dd());

        }
    }

    public function update()
    {
        $this->openModel=true;
        $balance = Balance::where('type','Profile edit')->where('user_id', Auth::user()->id)
        ->where('qty', '>', 0)
        ->first();
        if(!$balance)
        {
            session()->flash('message', 'Sorrt you dont have profile edit request.');
            return;
        }
        // $user = User::find(Auth::user()->id);
    }
}
