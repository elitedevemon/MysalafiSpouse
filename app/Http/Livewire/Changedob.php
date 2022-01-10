<?php

namespace App\Http\Livewire;

use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Changedob extends Component
{
  public $dob;
  public function changedob()
  {
    $set_date = new DateTime($this->dob);
    $today = new DateTime();
    $interval = $set_date->diff($today);
    $lock_profile_date = date('Y-m-d', strtotime($this->dob. " +$interval->y Year"." +1 Year"));
    // dd($lock_profile_date);
    User::where('id', Auth::user()->id)->update([
      'dob' => $this->dob,
      'lock_profile_date' => $lock_profile_date
    ]);
    return redirect('/');
  }
  public function render()
  {
    return view('livewire.changedob')->layout('layouts.changedobmaster');
  }
}
