<?php

namespace App\Http\Livewire;

use App\Mail\ProfileReject;
use App\Mail\ProfileUpdate;
use App\Models\Balance;
use App\Models\EmailLog;
use App\Models\UpdateUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ProfileUpdateView extends Component
{
    public $userID;
    public $user;
    public $new_changes;
    public function mount()
    {
       
        $this->userID;
        // dd($this->userID);
        $this->new_changes = UpdateUser::find($this->userID);
        // dd($this->new_changes->user_id);
        $this->user = User::find($this->new_changes->user_id);
    }
    public function render()
    {
        return view('livewire.profile-update-view');
    }
    public function approve()
    {
        $this->new_changes->status = 1;
        $this->new_changes->update();
        Mail::to($this->user->email)->send(new ProfileUpdate(['data' => $this->new_changes]));
        EmailLog::forceCreate([
            'type' => 'Profile Update Approve',
            'user_id' => $this->new_changes->user_id,
            'message' => 'Your profile has been updated',
            'profile_link' => url('/profile-view/').'/'.$this->new_changes->user_id
        ]);
        session()->flash('message', 'Profile update successfully.');
        return redirect('/superadmin/profile-update');
        // return redirect('/profile-update');
    }
    public function reject()
    {
        $this->new_changes->status = 2;
        $this->new_changes->update();
        Balance::forceCreate([
            'qty' => 1,
            'user_id' => $this->new_changes->user_id,
            'type' => 'Profile Edit'
        ]);
        Mail::to($this->user->email)->send(new ProfileReject(['data' => $this->new_changes]));
        EmailLog::forceCreate([
            'type' => 'Reject Profile Update',
            'user_id' => $this->new_changes->user_id,
            'message' => 'Your profile has been reject and your balance is reverted',
            'profile_link' => url('/profile-view/').'/'.$this->new_changes->user_id
        ]);
        session()->flash('message', 'Profile update successfully.');
        return redirect('/superadmin/profile-update');
        // return redirect('/profile-update');
    }
}
