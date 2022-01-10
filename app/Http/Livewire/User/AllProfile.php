<?php

namespace App\Http\Livewire\User;

use App\Mail\MatchReceived;
use App\Mail\MatchRequest;
use App\Models\Balance;
use App\Models\Config;
use App\Models\EmailLog;
use App\Models\RequestLog;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Swift_TransportException;

class AllProfile extends Component
{
    public $filter;
    public $user;
    public $clsemodel= true;
    public $sendreq;
    public $reqsuccess;
    public $users;
    public $search;
    public $openSearch;
    public $readMore=false;
    protected $queryString = ['filter'];
    public  $residence; 
    public  $residenceuk; 
    public $residenceSelect;
    public $age_from;
    public $config;
    public $age_to;
    public $ethincity;
    public $ethincityeSelect;
    public $reciver_user;
    public function expand($item)
    {
            $this->readMore = $item;   
    }
    // public function closeSearch()
    // {
    //     $this->openSearch = false;
    // }
    // public function opensearch()
    // {
    //     $this->openSearch = true;
    // }
    public function mount(){
        
        $this->config = Config::first();
        $this->user = Auth::user();
        $this->residence=User::groupBy('residence')->get(['residence','ethnicity', 'id']);
        $this->residenceuk=User::groupBy('residence')->where('type', 'UK Base')->get(['residence','ethnicity', 'id']);
        $this->ethincity=User::groupBy('ethnicity')->get(['residence','ethnicity', 'id']);
        // dd($this->residence);
        //  dd($this->residence);
    }
    public function getSearchData()
    {
        // dd($this->ethincityeSelect);
        // dd($this->residenceSelect);
        // $search = $this->search;
        // if($this->user->gender  == 'Male'){
        //     $this->users = User::where('gender', 'Female')->where('status', 'Active')
        //     ->where('visibility', 'Public')->where('user_type', 'user')->where('id', '!=', $this->user->id);
        // }
        // else{
        //     $this->users = User::where('gender', 'Male')->where('status', 'Active')->where('visibility', 'Public')->where('user_type', 'user')
        //     ->where('id', '!=', $this->user->id);
        // }
        // if($this->residenceSelect)
        // {
        // // $this->users->where('residence', $this->residenceSelect)->get();
        // }
        // dd( $this->users);
        // return;
    }
    public function render()
    {
        // dd($this->residenceSelect);
        $reqlog = RequestLog::where('r_user_id', Auth::user()->id)->whereIn('status', ['in-process', 'accept'])->pluck('user_id');
        // $senderlog = RequestLog::where('user_id', Auth::user()->id)->whereIn('status', ['new', 'in-process', 'accept'])->pluck('r_user_id');
        // dd($senderlog);
        $search = $this->residenceSelect;
        $search1 = $this->ethincityeSelect;
        $balance = Balance::whereIn('type', ['Match request', 'International match request'])
        ->where('qty', '>', 0)
        ->where('user_id', $this->user->id)
        
        ->sum('qty');
        // dd($balance );
        if($this->user->gender  == 'Male'){
          $this->users = User::where('gender', 'Female')->where('status', 'Active')
          ->where('deactive', null)
          ->where('visibility', 'Public')->where('user_type', 'user')
          ->whereNotIn('id',  $reqlog)
        //   ->whereNotIn('id',  $senderlog)
          ->where('id', '!=', $this->user->id);
        }
        else{
            $this->users = User::where('gender', 'Male')->where('status', 'Active')->where('visibility', 'Public')
            ->where('deactive', null)
            ->where('user_type', 'user')
            ->whereNotIn('id',  $reqlog)
            // ->whereNotIn('id',   $senderlog)
            // ->whereIn('user_id', '!=', $reqlog)
            ->where('id', '!=', $this->user->id);
        }
        if($this->filter == 'all'){
            // dd('ads');
            // if($this->residenceSelect){
            //     $this->users = $this->users
            //     ->where('residence', $this->residenceSelect)
            //     // ->orWhere('residence', 'LIKE', "%$search%")
            //     ->get();
            // }
            
            if($this->residenceSelect && !$this->age_from && !$this->age_to){
               
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                ->where('residence', 'LIKE', "%$search%")
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->residenceSelect && $this->ethincityeSelect && $this->age_from && $this->age_to){
              
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                ->where('residence', 'LIKE', "%$search%")
                ->where('ethnicity', 'LIKE', "%$search1%")
                ->whereBetween('age', [$this->age_from, $this->age_to])
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->residenceSelect && $this->ethincityeSelect){
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                ->where('residence', 'LIKE', "%$search%")
                ->where('ethnicity', 'LIKE', "%$search1%")
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
           
            elseif($this->ethincityeSelect && $this->age_from && $this->age_to){
                // dd('asd');
                $this->users = $this->users->where('ethnicity', 'LIKE', "%$search1%")
                ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->ethincityeSelect){
                // dd('adsa');
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                ->where('ethnicity', 'LIKE', "%$search1%")
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->residenceSelect && $this->age_from && $this->age_to){
                // dd('asd');
                $this->users = $this->users->where('residence', 'LIKE', "%$search%")
                ->whereBetween('age', [$this->age_from, $this->age_to])
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->age_from && $this->age_to){
               
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                // ->where('residence', 'LIKE', "%$search%")
                ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            
            else{
                // dd('ads');
                $this->users = $this->users
                ->get();
            }
            // dd($this->users);
        }
        else
        {
            if($this->age_from && $this->age_from && $this->residenceSelect){
            $this->users = $this->users->where('type', $this->filter)
            // ->where('residence', $this->residenceSelect)
            ->where('residence', 'LIKE', "%$search%")
            ->whereBetween('age', [$this->age_from, $this->age_to])
            ->get();
            }
            elseif($this->ethincityeSelect){
                // dd('adsa');
                $this->users = $this->users
                ->where('type', $this->filter)
                // ->where('residence', $this->residenceSelect)
                ->where('ethnicity', 'LIKE', "%$search1%")
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->residenceSelect && $this->ethincityeSelect){
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                ->where('residence', 'LIKE', "%$search%")
                ->where('type', $this->filter)
                ->where('ethnicity', 'LIKE', "%$search1%")
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->residenceSelect && $this->ethincityeSelect && $this->age_from && $this->age_to){
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                ->where('residence', 'LIKE', "%$search%")
                ->where('type', $this->filter)
                ->where('ethnicity', 'LIKE', "%$search1%")
                ->whereBetween('age', [$this->age_from, $this->age_to])
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->ethincityeSelect && $this->age_from && $this->age_to){
                $this->users = $this->users
                // ->where('residence', $this->residenceSelect)
                // ->where('residence', 'LIKE', "%$search%")
                ->where('ethnicity', 'LIKE', "%$search1%")
                ->where('type', $this->filter)
                ->whereBetween('age', [$this->age_from, $this->age_to])
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->age_from && $this->age_from){
                $this->users = $this->users->where('type', $this->filter)
                // ->where('residence', $this->residenceSelect)
                // ->where('residence', 'LIKE', "%$search%")
                ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            elseif($this->residenceSelect){
                $this->users = $this->users->where('type', $this->filter)
                // ->where('residence', $this->residenceSelect)
                ->where('residence', 'LIKE', "%$search%")
                // ->whereBetween('age', [$this->age_from, $this->age_to])
                ->get();
            }
            else{
                
                $this->users = $this->users->where('type', $this->filter)
                ->get();
            }
        }
        
        return view('livewire.user.all-profile')->layout('layouts.site-master')
        ->with('balance', $balance);
        // ->with('users', $users);
    }
    public function sendReq($id)
    {
        // dd($id);
        // $receiverUser = ;
        $this->reciver_user = User::find($id); 
        $this->reqsuccess= false;
        $this->sendreq = 'true'.$id;
        
    }
    public function send($id)
    {
        // dd($id);
        $receChk = RequestLog::where('r_user_id', Auth::user()->id)->where('user_id', $id)->whereIn('status', ['new', 'in-process', 'accept'])->first();
        //$previous = RequestLog::where('user_id', Auth::user()->id)->whereIn('status', ['new', 'in-process', 'accept'])->first();
        $previous = RequestLog::where('r_user_id', Auth::user()->id)
                                ->orWhere('user_id', Auth::user()->id)
                                ->whereIn('status', ['new', 'in-process', 'accept'])
                                ->get();
                                //return dd($previous);
        
        if($receChk){
            if($receChk->status == 'new' || $receChk->status == 'in-process' || $receChk->status == 'accept'){
                $this->errorBag->add('errorMessage', 'This user already sent request to you');
                return;
            } 
        }
        $alreadyCheck = RequestLog::where('r_user_id', $id)->where('user_id', Auth::user()->id)->whereIn('status', ['new','approve', 'in-process', 'accept'])->first();
        if($alreadyCheck){
            if($alreadyCheck->status == 'new' || $alreadyCheck->status == 'accept' || $alreadyCheck->status == 'in-process'){
                session()->flash('djkhasdkljh', 'You have already sent a match request to this profile. Your match request is currently processing. Please check your portal: Match Request Updates page/email inbox for further updates. <br><br>BarakAllāhu Feekum, MySalafiSpouse team.');
                // $this->errorBag->add('errorMessage', 'You have already send request this user');
                return;
            } 
        }  
        foreach ($previous as $previousItem ) {
            if (Auth::user()->gender == "Male") {
                $authgender = "Brother";
            }else{
                $authgender = "Sister";
            }
            if($previousItem){
                // if($previous->status == 'new' || $previous->status == 'in-process' || $previous->status == 'accept'){
                if($previousItem->share == 1){
                    // $this->errorBag->add('previousreq', '');
                    // dd('asd');
                    $receiver_user = User::where('id', $previousItem->user_id)->first();
                    if (Auth::user()->id == $previousItem->user_id) {
                        $profile_code = $previousItem->receiver_profile_code;
                    }elseif(Auth::user()->id == $previousItem->r_user_id){
                        $profile_code = $receiver_user->profile_code;
                    }
                    session()->flash('previous', "$authgender, how did your last match go with profile $profile_code?");
                    return;
                } 
            }
        } 
        $receiver = User::find($id);
        if($this->user->type  == 'UK Base' && $receiver->type == 'UK Base'){
            // dd('asda');
            $req = Balance::where('type','Match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$req){
                session()->flash('zerobalance', 'encrpt code.');
                // $this->errorBag->add('errorMessage', 'Youu dont have request');
                return;
            }
        }
        else{
            
            $req = Balance::where('type','International match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$req){
                session()->flash('zerobalance', 'encrpt code.');
                // $this->errorBag->add('errorMessage', 'Youu dont have request');
                return;
            }
        }   
        if($this->user->type  == 'International')
        {
            $req = Balance::where('type','International match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$req){
                // $this->errorBag->add('errorMessage', 'Youu dont have request');
                session()->flash('zerobalance', 'encrpt code.');
                return;
            }
        }
        // else{
        //     dd('asda');
        //     $this->errorBag->add('errorMessage', 'Youu dont have request');
        //     return;
        // }
        
        // else{
        //     $req = Balance::where('type','Match request')->where('qty', '>', 0)->where('user_id', $this->user->id)->first();
        // }
        // if(!$req){
        //     $this->errorBag->add('errorMessage', 'Youu dont have request');
        // }
        // else
        // {
            $matchreq = RequestLog::forceCreate([
                'user_id' => $this->user->id,
                'r_user_id' => $receiver->id,
                'receiver_profile_code' => $receiver->profile_code,
                'status' => 'new',
                'type' => 'send',
            ]);
            $req->qty = $req->qty - 1;
            $req->update();
            $this->reqsuccess= true;
            $config = Config::first();
            if($config->email_match_request == 1)
            {
                $admin = User::where('user_type', 'superadmin')->first();
                try {
                    Mail::to($admin->email)->send(new MatchRequest(['data' => $matchreq]));
                }
                catch(Swift_TransportException $ex){
                    $this->errorBag->add('errormessage', 'There was an error sending mail');
                }
            }
            try {
                Mail::to($this->user->email)->send(new MatchRequest(['data' => $matchreq]));
            }
            catch(Swift_TransportException $ex){
                $this->errorBag->add('errormessage', 'There was an error sending mail');
            }
            EmailLog::forceCreate([
                'type' => 'Match Request (Sent)',
                'user_id' => Auth::user()->id,
                // 'message' => Auth::user()->profile_code.' has sent request to '.$receiver->profile_code,
                'message' => "Your match request is currently processing - Please check your Match Request Updates page on the portal/your email inbox for further updates regarding this Match Request. 
                We will get back to you with an update on the result of your match request to profile $receiver->profile_code.",
                'profile_link' => url('/profile-view/').'/'.$receiver->id
            ]);
            session()->flash('sendReq', 'test ?.');
            return;
            // $this->errorBag->add('susscessMessage', 'Request send successfully we will contact ASAP');

        }
    // }
    public function inprocess($id)
    {
        $receiver = User::find($id);
        if($receiver->type == 'International')
        {
            $req = Balance::where('type','International match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
        }
        else{
            $req = Balance::where('type','Match request')->where('qty', '>', 0)->where('user_id', $this->user->id)->first();
        }
        if(!$req){
            session()->flash('zerobalance', 'encrpt code.');
            // $this->errorBag->add('errorMessage', 'Youu dont have request');
        }
        else
        {
            $matchreq = RequestLog::forceCreate([
                'user_id' => $this->user->id,
                'r_user_id' => $receiver->id,
                'receiver_profile_code' => $receiver->profile_code,
                'status' => 'new',
                'type' => 'send',
            ]);
            $req->qty = $req->qty - 1;
            $req->update();
            $this->reqsuccess= true;
            $config = Config::first();
            if($config->email_match_request == 1)
            {
                $admin = User::where('user_type', 'superadmin')->first();
                try {
                    Mail::to($admin->email)->send(new MatchRequest(['data' => $matchreq]));
                }
                catch(Swift_TransportException $ex){
                    $this->errorBag->add('errormessage', 'There was an error sending mail');
                }
            }
            try {
                Mail::to($this->user->email)->send(new MatchRequest(['data' => $matchreq]));
            }
            catch(Swift_TransportException $ex){
                $this->errorBag->add('errormessage', 'There was an error sending mail');
            }
            EmailLog::forceCreate([
                'type' => 'Match Request',
                'user_id' => Auth::user()->id,
                'message' => Auth::user()->profile_code.'has sent request to'.$receiver->profile_code,
                'profile_link' => url('/')
            ]);
            session()->flash('sendReq', 'encrpt code.');
            // $this->errorBag->add('sendReq', 'Request send successfully we will contact ASAP');

        }
    }
    public function unsuccessfull($id)
    {
        // dd('asd');
        $receiver = User::find($id);
        $requests = RequestLog::where('status', 'accept')
        ->where('user_id', Auth::user()->id)
        ->orWhere('r_user_id', Auth::user()->id)
        ->where('status', 'accept')
        ->get();
        //return dd($requests);
        if($requests->count() > 0){
            foreach($requests as $item)
            {
               
                $request = RequestLog::where('id',$item->id)->where('status', 'accept')->first();
                //return dd($request);
                $request->status = 'Unsuccessfull';
                $request->update();
                if (Auth::user()->id == $request->user_id) {
                    if(Auth::user()->type == 'International')
                    {
                        // Balance::forceCreate([
                        //     'user_id' => Auth::user()->id,
                        //     'qty' => 1,
                        //     'type' => 'International match request',
                        // ]);
    
                        //For auth user
                        $additional_balance = Balance::where('user_id', Auth::user()->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => Auth::user()->id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }
                        
                        //For another user
                        $additional_balance = Balance::where('user_id', $request->r_user_id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => $request->r_user_id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }
    
                    }
                    elseif(Auth::user()->type == 'UK Base')
                    {
                        // Balance::forceCreate([
                        //     'user_id' => Auth::user()->id,
                        //     'qty' => 1,
                        //     'type' => 'Match request',
                        // ]);

                        //For auth user
                        $additional_balance = Balance::where('user_id', Auth::user()->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => Auth::user()->id,
                                'type' => 'Match request',
                                'qty' => 1,
                            ]);
                        }

                        //For another user
                        $additional_balance = Balance::where('user_id', $request->r_user_id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => $request->r_user_id,
                                'type' => 'Match request',
                                'qty' => 1,
                            ]);
                        }
                    }
                    else{
                        // Balance::forceCreate([
                        //     'user_id' => Auth::user()->id,
                        //     'qty' => 1,
                        //     'type' => 'International match request',
                        // ]);

                        //For auth user
                        $additional_balance = Balance::where('user_id', Auth::user()->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => Auth::user()->id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }

                        //For another user
                        $additional_balance = Balance::where('user_id', $request->r_user_id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => $request->r_user_id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }
                    }
                }

                if (Auth::user()->id == $request->r_user_id) {
                    $sender_user_info = User::where('id', $request->user_id)->first();
                    if(Auth::user()->type == 'International')
                    {
                        // Balance::forceCreate([
                        //     'user_id' => $sender_user_info->id,
                        //     'qty' => 1,
                        //     'type' => 'International match request',
                        // ]);
    
                        //For auth user
                        $additional_balance = Balance::where('user_id', Auth::user()->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => Auth::user()->id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }

                        //For another user
                        $additional_balance = Balance::where('user_id', $sender_user_info->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => $sender_user_info->id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }
    
                    }
                    elseif(Auth::user()->type == 'UK Base')
                    {
                        // Balance::forceCreate([
                        //     'user_id' => $sender_user_info->id,
                        //     'qty' => 1,
                        //     'type' => 'Match request',
                        // ]);

                        //For another user
                        $additional_balance = Balance::where('user_id', $sender_user_info->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => $sender_user_info->id,
                                'type' => 'Match request',
                                'qty' => 1,
                            ]);
                        }

                        //For auth user
                        $additional_balance = Balance::where('user_id', Auth::user()->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => Auth::user()->id,
                                'type' => 'Match request',
                                'qty' => 1,
                            ]);
                        }
                    }
                    else{
                        // Balance::forceCreate([
                        //     'user_id' => $sender_user_info->id,
                        //     'qty' => 1,
                        //     'type' => 'International match request',
                        // ]);

                        //For anohter user
                        $additional_balance = Balance::where('user_id', $sender_user_info->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => $sender_user_info->id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }

                        //For auth user
                        $additional_balance = Balance::where('user_id', Auth::user()->id)->whereIn('type', ['Match request', 'International match request'])
                        ->where('qty', '>', 0)
                        ->sum('qty');
                        if ($additional_balance == 0) {
                            Balance::forceCreate([
                                'user_id' => Auth::user()->id,
                                'type' => 'International match request',
                                'qty' => 1,
                            ]);
                        }
                    }
                }
                
            }
        }
        
       
        if($this->user->type  == 'International')
        {
            $req = Balance::where('type','International match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$req){
                session()->flash('zerobalance', 'encrpt code.');
                // $this->errorBag->add('errorMessage', 'Youu dont have request');
                return;
            }
        }
        elseif($this->user->type  == 'UK Base' && $receiver->type == 'UK Base'){
            // dd('asda');
            $req = Balance::where('type','Match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$req){
                session()->flash('zerobalance', 'encrpt code.');
                // $this->errorBag->add('errorMessage', 'Youu dont have request');
                return;
            }
        }
        else{
            
            $req = Balance::where('type','International match request')->where('user_id', $this->user->id)
            ->where('qty', '>', 0)
            ->first();
            if(!$req){
                session()->flash('zerobalance', 'encrpt code.');
                // $this->errorBag->add('errorMessage', 'Youu dont have request');
                return;
            }
        }
        $req->qty = $req->qty - 1;
        $req->update();
        $matchreq = RequestLog::forceCreate([
            'user_id' => Auth::user()->id,
            'r_user_id' => $id,
            'receiver_profile_code' => $receiver->profile_code,
            'status' => 'new',
            'type' => 'send',
        ]); 
        $this->reqsuccess= true;
        $config = Config::first();
        if($config->email_match_request == 1)
        {
            $admin = User::where('user_type', 'superadmin')->first();
            Mail::to($admin->email)->send(new MatchRequest(['data' => $matchreq]));
        }
        Mail::to($this->user->email)->send(new MatchRequest(['data' => $matchreq]));
        EmailLog::forceCreate([
            'type' => 'Match Request',
            'user_id' => Auth::user()->id,
            'message' => Auth::user()->profile_code.'has sent request to'.$receiver->profile_code,
            'profile_link' => url('/')
        ]);
        session()->flash('sendReq', 'encrpt code.');
        // session()->flash('susscessMessage', 'Request send successfully we will contact ASAP.');
        // $this->errorBag->add('susscessMessage', 'Request send successfully we will contact ASAP');

    }
    public function closemodel($true)
    {
        $this->sendreq = false;
    }
}
