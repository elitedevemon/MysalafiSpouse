<?php

namespace App\Http\Livewire;

use App\Mail\FemaleShare;
use App\Mail\InProcess;
use App\Mail\MatchReceived;
use App\Mail\Reject;
use App\Mail\Share;
use App\Models\Balance;
use App\Models\EmailLog;
use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Swift_TransportException;
class MatchRequestView extends Component
{
    public $reqID;
    public function mount()
    {
        $this->reqID;
    }
    public function render()
    {
       
        $reqLog=RequestLog::find($this->reqID);
        return view('livewire.match-request-view')
        ->with('reqLog', $reqLog);
    }
    public function reject()
    {
        $req=RequestLog::where('id', $this->reqID)->first();
        $req->status= 'Unsuccessfull';
        $req->update();
        Mail::to($req->senderuser->email)->send(new Reject(['id' => $req->r_user_id,'receiver_profile_code' => $req->receiver_profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
        EmailLog::forceCreate([
            'type' => 'Unsuccessful Match Request',
            'user_id' => $req->user_id,
            'message' => "Your Match Request has been unsuccessful.
            </br>
            </br>
            BarakAllāhu Feekum, MySalafiSpouse team.",
            'profile_link' => url('/profile-view/').'/'.$req->r_user_id
        ]);
        if($req->senderuser->type == 'UK Base' && $req->user->type == 'UK Base')
        {
            $returnReq = 'Match request';
        }else{
            $returnReq = 'International match request';
        }
        $additional_balance = Balance::where('user_id', $req->senderuser->id)->whereIn('type', ['Match request', 'International match request'])->where('qty', '>', 0)
        ->sum('qty');
        $req_log_info = RequestLog::where('user_id', $req->senderuser->id)->where('status', 'accept')->where('share', '1')->first();
        if ($additional_balance == 0) {
            if ($req_log_info) {
                
            } else {
                Balance::forceCreate([
                    'user_id' => $req->senderuser->id,
                    'type' => $returnReq,
                    'qty' => 1,
                ]);
            }
        }
        session()->flash('message', 'Proposal reject successfully.');
        return redirect('superadmin/match-request-view/'.$this->reqID);
    }
    public function share()
    {
        // ak mint plesae uska kam kr lo 
        $req=RequestLog::where('id', $this->reqID)->first();
        $sender  = User::where('id', $req->user_id)->first();
        $receiver  = User::where('id', $req->r_user_id)->first();
        if($sender->gender == 'Female'){
            Mail::to($sender->email)->send(new FemaleShare(['id' => $req->r_user_id,'receiver_profile_code' => $req->receiver_profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
            EmailLog::forceCreate([
                'type' => 'Wali (Guardian) Contact Details',
                'user_id' => $sender->id,
                // 'message' => "Your Match Request was successful!</br> Your Wali's details have been forwarded to $receiver->profile_code by our team. Please do let us know how everything goes sis!
                // </br></br>
                // BarakAllāhu Feekum, </br></br> MySalafiSpouse team.",
                'message' => "You have been matched successfully! <br> Your Wali's (guardian) details have been forwarded to $receiver->profile_code - Please let us know how everything goes sis.</br> BarakAllāhu Feekum MySalafiSpouse team!.",
                'profile_link' => url('/profile-view/').'/'.$receiver->user_id
            ]);
        }
        if($receiver->gender == 'Female'){
            // dd('adsa');
            Mail::to($receiver->email)->send(new FemaleShare(['id' => $req->user_id,'receiver_profile_code' => $sender->profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
            EmailLog::forceCreate([
                'type' => 'Wali (Guardian) Contact Details',
                'user_id' => $receiver->id,
                // 'message' => "Your Match Request was successful!</br> Your Wali's details have been forwarded to $sender->profile_code by our team. Please do let us know how everything goes sis!
                // <br><br>
                // BarakAllāhu Feekum, <br><br> MySalafiSpouse team.",
                'message' => "You have been matched successfully! <br> Your Wali's (guardian) details have been forwarded to $sender->profile_code - Please let us know how everything goes sis.</br> BarakAllāhu Feekum MySalafiSpouse team!.",
                'profile_link' => url('/profile-view/').'/'.$sender->user_id
            ]);
        }

        if($sender->gender == 'Male'){
            Mail::to($sender->email)->send(new Share(['guardian' => $receiver->guardian, 'id' => $req->r_user_id,'receiver_profile_code' => $req->receiver_profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
            EmailLog::forceCreate([
                'type' => 'Wali (Guardian) Contact Details',
                'user_id' => $req->user_id,
                'message' => "Your Match Request has been successful! 
                <br> $req->receiver_profile_code Wali's contact details:  
                <br> $receiver->guardian   
                <br>
                Please do let us know how everything goes brother! <br><br>
                BarakAllāhu Feekum, <br><br> MySalafiSpouse team.",
                'profile_link' => url('/profile-view/').'/'.$req->r_user_id
            ]);
        }

        if($sender->gender == 'Female'){
            Mail::to($receiver->email)->send(new Share(['guardian' => $sender->guardian, 'id' => $req->user_id,'receiver_profile_code' => $sender->profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
            EmailLog::forceCreate([
                'type' => 'Wali (Guardian) Contact Details',
                'user_id' => $req->user_id,
                'message' => "Your Match Request has been successful! 
                <br> $req->receiver_profile_code Wali's contact details:  
                <br> $sender->guardian   
                <br>
                Please do let us know how everything goes brother! <br><br>
                BarakAllāhu Feekum, <br><br> MySalafiSpouse team.",
                'profile_link' => url('/profile-view/').'/'.$req->r_user_id
            ]);
        }
        
        
        $req->share = 1;
        $req->update();
        session()->flash('message', 'Guardian information has been shared sussessfully.');
        return redirect('superadmin/match-request-view/'.$this->reqID);
    }
    public function inprocess()
    {
        $req=RequestLog::where('id', $this->reqID)->first();
        if($req->senderuser && $req->senderuser->gender == 'Male'){
            $asda = 'his';
        }else{
            $asda = 'her';
        }
        // dd($req->user->email);
        $req->status= 'in-process';
        $req->update();
        Mail::to($req->senderuser->email)->send(new InProcess(['profile_code' => $req->receiver_profile_code, 'id' => $req->r_user_id]));
        Mail::to($req->user->email)->send(new MatchReceived(['data' => $req->senderuser->profile_code, 'id' => $req->user_id, 'asasdad' => $asda]));
        EmailLog::forceCreate([
            'type' => 'Update',
            'user_id' => $req->user_id,
            'message' => "$req->receiver_profile_code is currently considering your profile. We will update you as soon as our team have a response from their side on the result of your match request.
            </br>
            BarakAllāhu Feekum, MySalafiSpouse team.",
            'profile_link' => url('/profile-view/').'/'.$req->r_user_id
        ]);
        EmailLog::forceCreate([
            'type' => 'Match Request Received',
            'user_id' => $req->r_user_id,
            // 'message' => $req->user_id.' has sent request for match ',
            'message' => "Profile {{$req->senderuser->profile_code}} is interested in your profile. Please see attached $asda profile and kindly accept/reject the match request",
            'profile_link' => url('/profile-view/').'/'.$req->r_user_id
        ]);
        session()->flash('message', 'Proposal in-process successfully.');
        return redirect('superadmin/match-request-view/'.$this->reqID);
    }
}
