<?php

namespace App\Http\Livewire\User;

use App\Mail\AcceptRequest;
use App\Mail\MatchRequest;
use App\Mail\Reject;
use App\Models\Balance;
use App\Models\Config;
use App\Models\EmailLog;
use App\Models\PaymentMange;
use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;

class Dashboard extends Component
{
    use WithFileUploads;
    public $filter;
    public $user;
    public $payment_mode;
    public $buyStatus;
    public $logId;
    public $mtn_no;
    public $evidence;
    public $successmessage;
    public $config;
    // public $user
    public $senderuserdata;
    public $buyAccept;
    protected $queryString = ['filter'];
    public function chkstatus($id)
    {
        $this->buyStatus = true;
        $this->logId = $id;
        // dd($this->buyStatus);
    }
    public function acceptReq()
    {
        $this->buyAccept = true;
    }
    public function cencel()
    {
        $this->buyStatus = false;
        $this->buyAccept = false;
    }
    public function mount()
    {
        // dd(Auth::user()->id);
        $this->user = Auth::user();
    }
    public function buynow()
    {
        if($this->payment_mode == 'stripe'){
            return redirect('pay-now-with-stripe?type=4&logid='.$this->logId);
        }
        ///
        if($this->payment_mode == 'paypal'&& $this->interextraMatchRequest == 1){
        return redirect('pay-now-with-paypal?qty='.$this->qty.'&price='.$this->total.'&type=1');
        }
    }
    public function manuaReq($req_id, $peram){
        // dd($this->evidence);
        $paymentMange = PaymentMange::where('req_id', $req_id)->where('user_id', Auth::user()->id)->first();
        if($paymentMange){
            session()->flash('errormessage', 'You have already sent Cancel Match Request to MySalafiSpouse team.');
            return;
        }
        $this->validate([
            'mtn_no' => $this->user->type == 'International' && $this->payment_mode == 'other' ? 'required' : '',
            // 'evidence' => 'image|max:1024',
        ]);
        PaymentMange::forceCreate([
            'qty' => 1,
            'amount' =>1,
            'req_id' =>$req_id,
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
    public function render()
    {
        $this->config = Config::first();
        $balance = Balance::whereIn('type', ['Match request', 'International match request'])->where('qty', '>', 0)
        ->where('user_id', $this->user->id)
        ->sum('qty');
        $sentCount = RequestLog::where('user_id', Auth::user()->id)->count();
        $receivedCount = RequestLog::where('r_user_id', Auth::user()->id)->where('status', '!=','new')->count();
        if($this->filter == 'sent'){
            // dd('asd');
            $request_log = RequestLog::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
            // dd($request_log);
        }
        elseif($this->filter == 'Unsuccessfull'){
            // dd('ad');
            // dd(Auth::user()->id);
            $request_log = RequestLog::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->where('status', 'Unsuccessfull')->get();
            // dd($request_log);
        }
        else{
            // dd('sd');
            $request_log = [];
        }
        if($this->filter == 'received'){
            $receiver_log = RequestLog::where('r_user_id', Auth::user()->id)->orderBy('id', 'desc')->where('status', '!=','new')->get();
            // dd($request_log)
        }
        else
        {
            $receiver_log = [];
        }
        return view('livewire.user.dashboard')->layout('layouts.site-master')
        ->with('balance', $balance)
        ->with('sentCount', $sentCount)
        ->with('receivedCount', $receivedCount)
        ->with('receiver_log', $receiver_log)
        ->with('request_log', $request_log);
    }
    public function cacnelrequest($id)
    {
        $req = RequestLog::find($id);
        $req->status = 'Unsuccessfull';
        $req->update();
        $config = Config::first();
        if($config->email_match_request == 1)
        {
            $admin = User::where('user_type', 'superadmin')->first();
            Mail::to($admin->email)->send(new Reject(['id' => $req->r_user_id,'receiver_profile_code' => $req->user->profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
        }
        Mail::to($req->senderuser->email)->send(new Reject(['id' => $req->r_user_id,'receiver_profile_code' => $req->user->profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
        EmailLog::forceCreate([
            'type' => 'Unsuccessful Match Request',
            'user_id' => $req->user_id,
            'message' => "Your match request to profile $req->receiver_profile_code has been unsuccessful.\n BarakAllāhu Feekum, MySalafiSpouse team",
            'profile_link' => url('/profile-view/').'/'.$req->r_user_id
        ]);
        if($req->senderuser->type == 'UK Base' && $req->user->type == 'UK Base')
        {
            $returnReq = 'Match request';
        }else{
            $returnReq = 'International match request';
        }
        $additional_balance = Balance::where('user_id', $req->senderuser->id)->whereIn('type', ['Match request', 'International match request'])
        ->where('qty', '>', 0)
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
        // session()->
        session()->flash('message', 'Proposal cancelled successfully.');
        return;
        // $this->errorBag->add('successmessage', 'Proposal cancelled successfully');
        // $this->successmessage = true;
    }
    public function acceptrequest($id)
    {
       
        $req = RequestLog::find($id);
        $this->senderuserdata = User::where('id', $req->user_id)->first();
        $userasd = User::find($req->user_id);
        // dd($userasd);
        if($this->user->type == 'UK Base' && $userasd->type == 'UK Base')
        {
            $balance = Balance::where('type','Match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$balance){
                session()->flash('message', 'You dont have request.');
                return;
            }
        }
        else
        {
            $balance = Balance::where('type','International match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$balance){
                session()->flash('message', 'You dont have request.');
                return;
            }
        }
        if($this->user->type == 'International')
        {
           
            $balance = Balance::where('type','International match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$balance){
                session()->flash('message', 'You dont have request.');
                return;
            }   
            
        }
        
       
        // else
        // {
           
            $balance->qty = $balance->qty - 1;
            $balance->update();
            $config = Config::first();
            if($config->email_decision_request == 1)
            {
                $admin = User::where('user_type', 'superadmin')->first();
                Mail::to($admin->email)->send(new AcceptRequest(['id' => $req->r_user_id,'receiver_profile_code' => $req->user->profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
            }
            Mail::to($req->senderuser->email)->send(new AcceptRequest(['id' => $req->r_user_id,'receiver_profile_code' => $req->user->profile_code, 'sender_profile_code' => $req->senderuser->profile_code]));
            EmailLog::forceCreate([
                'type' => 'Match Request (Successful)',
                'user_id' => $req->user_id,
                // 'message' => $req->user->profile_code.'  has been accept request against '.$req->senderuser->profile_code,
                'message' => "Your match request to profile" . $req->user->profile_code . "has been successful!",
                'profile_link' => url('/profile-view/').'/'.$req->r_user_id
            ]);
            $req->status = 'accept';
            $req->update();
            $this->buyStatus = false;
            $this->buyAccept = false;
            return;
        // }
    }
}
