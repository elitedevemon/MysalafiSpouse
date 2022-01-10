<div class="defaultsitecolor" style="padding-bottom: 60px;text-align:center;width:100%;">
    <a href="{{ url('/dashboard') }}" style="color: white;">
        <h1>Dashboard</h1>
    </a>
    @if(!$filter)
    <div class="customalink" style="padding-left: 44px;padding-right: 44px;">
        <a href="{{ url('/dashboard?filter=sent') }}" style="color: red;">Match Requests Sent
            {{ '('.$sentCount.')' }}</a>
    </div>
    <div style="padding-top: 38px;">
        <div class="customalink" style="padding-left: 27px;padding-right: 27px;">
            <a href="{{ url('/dashboard?filter=received') }}" style="color: red;">Match Requests Received
                {{ '('.$receivedCount.')' }}</a>
        </div>
    </div>
    <div style="padding-top: 38px;">
        <div class="customalink" style="padding-left: 15px;padding-right: 15px;">
            <a style="color: red;">Match Requests Remaining {{ '('.$balance.')' }}</a>
        </div>
    </div>
    <div style="padding-top: 38px;">
        <u> <a href="{{ url('/dashboard?filter=sent') }}" style="color:white;font-size:25px;">See all requests
                sent</a></u>
    </div>
    <div style="padding-top: 38px;">
        <u> <a href="{{ url('/dashboard?filter=received') }}" style="color:white;font-size:25px;">See all requests
                received</a></u>
    </div>
    {{-- <div class="fusion-row" style="padding-top: 20px;padding-bottom:20px;"> --}}

    {{-- </div> --}}
    @elseif($filter == 'sent')
    @if(isset($request_log))
    @foreach($request_log as $user)
    <div class="col-md-6">
        <div>
            <div style="background: white;text-align:center;padding:25px;border-radius: 10px;color:black;">
                <img style="width: 170px;" src="{{ url('/site/images/3e.png') }}" alt="">
                <h3>Profile Code: {{ $user->user->profile_code }}</h3>
                <b>Ethnicity & Residence:</b>
                <p>{{ $user->user->ethnicity }}, {{ $user->user->residence }}</p>
                <b>Age & Height:</b>
                <p>{{ $user->user->age }} | {{ $user->user->height }}</p>
                {{-- @if($readMore == $user->id) --}}
                <b>Brief Background:</b>
                <p>
                    {{ $user->user->about }}
                </p>
                <b>What I Am Looking For In A Potential Spouse:</b>
                <p>
                    {{ $user->user->potential_spouse }}
                </p>
                <b>Ulema (Scholars) I Listen To:</b>
                <p>
                    @foreach($user->user->userScholars as $item)
                    {{ $item->name }},
                    @endforeach
                    @if(isset($user->other_scholars))
                {{$user->other_scholars}},
            @endif
                </p>
                <b>Any Other Important Information:</b>
                <p>
                    {{ $user->user->any_other_information }}
                </p>
                @if($user->status == 'accept' && $user->share == 1 && $user->user->gender == 'Female')
                <b>Guardian information</b>
                <p>
                    {{ $user->user->guardian }}
                </p>
                @endif

                {{-- @endif
                @if(!$readMore)
                <button style="color: #224794;" wire:click="expand({{ $user->id }})"><i class="fa fa-plus"></i> More
                Detail</button>
                @else
                <button style="color: #224794;" wire:click="expand({{ $$user->id }})"><i class="fa fa-minus"></i>
                    Collapse</button>
                @endif --}}
            </div>
            @if($user->status == 'new')
            @if($buyStatus || session('message'))
            <div class="modal" style="display:block;">
                <div class="modal-content" style="color:black;padding-bottom:80px;">
                    <div>
                        <div style="text-align: right;">
                            <span class="close" wire:click="cencel()"> &times;</span>
                            {{-- <span on></span>  --}}
                        </div>
                        <b style="color:red;text-align:left;">You Have Decided To Cancel This Match Request </b><br><br>
                        @if(!session('message'))
                        <p style="text-align:left;color:blue;">Match Request Cancellation Fee: @if(Auth::user()->type ==
                            'UK Base'){{ '(£'.$config->match_cacnel_fee_euro.')' }}
                            @else{{ '($'.$config->match_cacnel_fee.')' }}@endif
                        </p>
                        @endif
                    </div>
                    <div class="row" style="text-align: left;">
                        @if(session('message'))
                        <div class="col-md-12">
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        </div>
                        @endif
                        @if(session('errormessage'))
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                {{session('errormessage')}}
                            </div>
                        </div>
                        @endif
                        @if(!session('message'))
                        <div class="col-md-8" style="text-align: left;">
                            <label style="font-weight: 400;">Select payment method</label>
                            <div style="width: 100%;">
                                <select wire:model="payment_mode"
                                    style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;">
                                    <option value="" hidden>Select</option>
                                    @if(Auth::user()->type == 'International')
                                    {{-- <option value="stripe">Stripe</option> --}}
                                    <option value="paypal">Paypal</option>
                                    @endif
                                    <option value="other">Bank Transfer</option>
                                </select>
                            </div>
                            @if($payment_mode == 'other')
                            <div class="col-md-8">
                                <br>
                                @if(Auth::user()->type == "UK Base")
                                <p><b>UK Bank Transfer ( £10 GBP)</b></p>
                                @else
                                <p><b>
                                        <p><b>Western Union Transfer ( £10 GBP)</b></p>
                                    </b></p>
                                @endif
                                @if(Auth::user()->type != "UK Base")

                                <p><b>Account name:</b> MR HAIDER RAZAQ</p>
                                <p><b>Account Number:</b> 87757629</p>
                                <p><b>Sort Code:</b> 09-01-28</p>
                                <p><b>Bank:</b> SANTANDER (UK)</p>
                                <br>


                                @else
                                <p><b>Account name:</b> H Razaq</p>
                                <p><b>Sort code:</b> 04-00-04</p>
                                <p><b>Account number:</b> 03970943</p>
                                <p><b>Bank:</b> Monzo (UK)</p>
                                <br> <br>
                                <p>MTCN Number</p>
                                <input type="text" wire:model="mtn_no"
                                    style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;"
                                    placeholder="MTCN Number">
                                @error('mtn_no')
                                <span style="color: red">MTCN Number is required</span>
                                @enderror
                                @endif
                                <p>Attach Payment Screenshot (Optional)</p>
                                <input type="file" wire:model="evidence"
                                    style="width: 100%;height: 30px;border-radius: 0px;padding-left: 0px;border-color:#224794;"
                                    placeholder="Evidence">
                                @error('evidence')
                                <span style="color: red">{{ $message }}</span>
                                @enderror

                                {{-- <br>
                                <p>Date</p>
                                <input type="date" style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;" placeholder="MTCN Number"> --}}
                            </div>
                            @endif
                            @if($payment_mode == 'paypal')
                            <div class="col-md-8">
                                
                                
                                
                                <br>
                                <div style="text-align: center;">
                                    <p><b style="text-align:center;">Cancel Match Request Fee
                                        @if(Auth::user()->type == 'UK Base')
                                        £{{$config->match_request_fee_euro}} @else $17 @endif 
                                        <br>
                                        Pay through our PayPal link below:
                                    </b></p>
                                </div>
                                @if($user->type != 'UK Base')
                                <div style="text-align: center;">
                            
                                    <u><a target="blank" style="color:blue;text-align:center;" href="https://www.paypal.me/HR5454">Click here to pay!
                                    </a></u>
                                </div>
                                
                                <br>
                                
                                <p>Attach Payment Screenshot (Optional)</p>
                                <input type="file" wire:model="evidence"
                                    style="width: 100%;height: 30px;border-radius: 0px;padding-left: 0px;border-color:#224794;"
                                    placeholder="Evidence">
                                @error('evidence')
                                <span style="color: red">{{ $message }}</span>
                                @enderror
                                @endif
                                <br>
                                <br>
                            </div>
                            @endif
                        </div>
                        @endif
                    </div>
                    <br>
                    @if(!session('message'))
                    {{-- <div class="col-md-12 custom_buy" style="align:center;"> --}}

                    <div style="text-align: left;">
                        @if($payment_mode == 'other' || $payment_mode == 'paypal')
                        <button wire:click="manuaReq({{$user->id}}, 'Cancel Request')" class="buy_custom"
                            style="padding:15px;color:green;border:none;text-align:left;">Yes, cancel this match
                            request.</button><br><br>
                        @endif
                        <button wire:click="cencel()" class="buy_custom" style="padding:15px;color:red;border:none;">No,
                            I have changed my mind.</button>
                    </div>
                    {{-- </div> --}}
                    @endif
                </div>
            </div>
            @endif
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <a wire:click="chkstatus({{ $user->id }})" style="color: red;cursor: pointer;">
                    <div class="customalink" style="text-align: center;">
                        <i class="fa fa-close" style="color:#224794;"></i><b style="padding-left: 10px;">Cancel This
                            Match Request</b>
                    </div>
                </a>
            </div>
            @else
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <div>
                    <div class="customalink" style="text-align: center;color:red;">
                        @if ($user->status == "Unsuccessfull")
                            <b style="padding-left: 10px;">{{ 'Unsuccessful Match Request' }}</b>
                        @elseif($user->status == 'accept')
                            <b style="padding-left: 10px;">{{ 'Successful Match Request' }}</b>
                        @else
                            <b style="padding-left: 10px;">{{ $user->status }}</b>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
    @endif
    @elseif($filter == 'received')
    @foreach($receiver_log as $user)
      <div class="col-md-6">
        <div>
            <div style="background: white;text-align:center;padding:25px;border-radius: 10px;color:black;">
                <img style="width: 170px;" src="{{ url('/site/images/3e.png') }}" alt="">
                <h3>Profile Code: {{ $user->senderuser->profile_code }}</h3>
                <b>Ethnicity & Residence:</b>
                <p>{{ $user->senderuser->ethnicity }}, {{ $user->senderuser->residence }}</p>
                <b>Age & Height:</b>
                <p>{{ $user->senderuser->age }} | {{ $user->senderuser->height }}</p>
                {{-- @if($readMore == $user->id) --}}
                <b>Brief Background:</b>
                <p>
                    {{ $user->senderuser->about }}
                </p>
                <b>What I Am Looking For In A Potential Spouse:</b>
                <p>
                    {{ $user->senderuser->potential_spouse }}
                </p>
                <b>Ulema (Scholars) I Listen To:</b>
                <p>
                    @foreach($user->senderuser->userScholars as $item)
                    {{ $item->name }},
                    @endforeach
                    @if(isset($user->other_scholars))
                        {{$user->other_scholars}},
                    @endif
                </p>
                <b>Any Other Important Information:</b>
                <p>
                    {{ $user->senderuser->any_other_information }}
                </p>

                {{-- @endif
                @if(!$readMore)
                <button style="color: #224794;" wire:click="expand({{ $user->id }})"><i class="fa fa-plus"></i> More
                Detail</button>
                @else
                <button style="color: #224794;" wire:click="expand({{ $$user->id }})"><i class="fa fa-minus"></i>
                    Collapse</button>
                @endif --}}
            </div>
            @if($user->status == 'new')
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <a wire:click="sendReq({{ $user->user->id }})" style="color: red;cursor: pointer;">
                    <div class="customalink" style="text-align: center;">
                        <i class="fa fa-close" style="color:#224794;"></i><b style="padding-left: 10px;">Cancel</b>
                    </div>
                </a>
            </div>

            {{-- /// --}}
            @elseif($user->status == 'in-process')
            @if($buyStatus || session('message'))
            <div class="modal" style="display:block;">
                <div class="modal-content" style="color:black;padding-bottom:80px;">
                    <div>
                        <div style="text-align: right;">
                            <span class="close" wire:click="cencel()"> &times;</span>
                            {{-- <span on></span>  --}}
                        </div>
                        <b style="text-align: center;color:red;">Reject Match Request</b>
                    </div>
                    <div class="row">
                        @if(session('message'))
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        </div>
                        @endif
                        @if(!session('message'))
                        <div class="col-md-8" style="text-align: left;">
                            Are you sure you would like to reject this match request?

                        </div>
                        @endif

                    </div>
                    <br>

                    <div class="col-md-8 custom_buy" style="padding:0px;padding-top:10px;text-align:left;">
                        @if(!session('message'))
                        <button wire:click="cacnelrequest({{ $user->id }})" wire:loading.attr='disabled'
                            wire:target='cacnelrequest' class="buy_custom"
                            style="padding-left:10px;padding-right:10px;color:green;border:none;"> Yes
                            <div style="float: left;padding-left:3px;" wire:loading wire:target="cacnelrequest">
                                Loading
                            </div>
                        </button>
                        @endif
                        <button wire:click="cencel()" class="buy_custom"
                            style="padding-left:10px;padding-right:10px;color:red;border:none;">No</button>
                    </div>

                </div>
            </div>
            @endif
            @if($buyAccept)
            <div class="modal" style="display:block;">
                <div class="modal-content" style="color:black;padding-bottom:80px;">
                    <div>
                        <div style="text-align: right;">
                            <span wire:click="cencel()" class="close" wire:click="cancel"> &times;</span>
                            {{-- <span on></span>  --}}
                        </div>
                        <b style="text-align: center;color:green;">ACCEPT MATCH REQUEST</b>
                    </div>
                    <div class="row">
                        @if(session('message'))
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-danger">
                                <p style="color:blue;text-align:center;">
                                    
                                    @if(Auth::user()->type == 'UK Base' && $senderuserdata->type == 'UK Base')
                                    We highly recommend all our applicants to match request multiple profiles at once,
                                    in order to increase their potential in finding a successful match by achieving a
                                    faster response!
                                    <br>
                                    <br>
                                    If you would like to request/accept multiple match requests at one time, then there
                                    is an additional fee of just <b>£{{ $config->match_request_fee_euro }}</b> per
                                    synchronous match, as your current package enables you to match/match request with
                                    x1 profile at a time.
                                    <br>
                                    <br>
                                    
                                Your current package allows you to match/match request just 1 profile at a time. You have selected to match with an additional profile. Would you like to proceed with the additional match request + fee payment?
                                    @else
                                    We highly recommend all our applicants to match request multiple profiles at once,
                                    in order to increase their potential in finding a successful match by achieving a
                                    faster response!
                                    <br>
                                    <br>
                                    If you would like to request/accept multiple match requests at one time, then there
                                    is an additional fee of just <b>${{ $config->match_request_fee }}</b> USD/£10 per
                                    synchronous match, as your current package enables you to match/match request with
                                    x1 profile at a time.
                                    <br>
                                    <br>
                                    
                                    Your current package allows you to match/match request just 1 profile at a time. You have selected to match with an additional profile. Would you like to proceed with the additional match request + fee payment?
                                    @endif
                                </p>
                            </div>
                        </div>
                        @endif
                        @if(!session('message'))
                        <div class="col-md-8" style="text-align: left;">
                            Are you sure you would like to accept this match request?
                        </div>
                        @endif

                    </div>
                    <br>

                    {{-- <div class="col-md-8 custom_buy" style="padding:0px;padding-top:10px;text-align:left;"> --}}
                    @if(session('message'))
                    <a style="color: green;background:#ccc5c5;" href="{{ url('/add-ons') }}" class="buy_custom"
                        style="padding-left:10px;padding-right:10px;color:green;border:none;"> 
                        @if(Auth::user()->type == 'UK Base' && $senderuserdata->type == 'UK Base')
                        Yes, I would like to proceed: Purchase Additional Match Request.
                        @else
                        Yes, I would like to proceed: Purchase International Match Request.
                        @endif

                    </a>
                    @else
                    <button wire:click="acceptrequest({{ $user->id }})" wire:loading.attr='disabled'
                        wire:target='acceptrequest' class="buy_custom"
                        style="padding-left:10px;padding-right:10px;color:green;border:none;">
                        Yes, accept this match request.
                        <div style="float: left;padding-left:3px;" wire:loading wire:target="acceptrequest">
                            Loading
                        </div>
                    </button>
                    @endif
                    <button wire:click="cencel()" class="buy_custom"
                        style="padding-left:10px;padding-right:10px;color:red;border:none;">No, I have changed my
                        mind.</button>
                    {{-- </div> --}}

                </div>
            </div>
            @endif
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <button wire:click="acceptReq" style="color: green;cursor: pointer;width:100%;">
                    <div class="customalink" style="text-align: center;">
                        <i class="fa fa-check" style="color:green;"></i><b
                            style="padding-left: 10px;color:green;">Accept This Match Request</b>
                    </div>
                </button>
                <a wire:click="chkstatus({{ $user->id }})" style="color: red;cursor: pointer;">
                    <div class="customalink" style="text-align: center;">
                        <i class="fa fa-close" style="color:#224794;"></i><b style="padding-left: 10px;">Reject This
                            Match Request</b>
                    </div>
                </a>
            </div>
            @else
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <div>
                    <div class="customalink" style="text-align: center">
                        <b style="padding-left: 10px;">
                            @if($user->status == 'accept')
                            <span style="color: green">Match Request Accepted</span>
                            @elseif($user->status == 'Unsuccessfull')
                            <span style="color: red">Unsuccessful Match Request</span>
                            @elseif($user->status == 'in-process')
                            <span style="color: orange">Match Request In-Process</span>
                            @else
                            {{$user->status}}
                            @endif
                        </b>
                    </div>
                </div>
            </div>
            @endif
        </div>
      </div>
    @endforeach


    @elseif($filter == 'Unsuccessfull')
    @foreach($request_log as $user)
    <div class="col-md-6">
        <div>
            <div style="background: white;text-align:center;padding:25px;border-radius: 10px;color:black;">
                <img style="width: 170px;" src="{{ url('/site/images/3e.png') }}" alt="">
                <h3>Profile Code: {{ $user->senderuser->profile_code }}</h3>
                <b>Ethnicity & Residence:</b>
                <p>{{ $user->senderuser->ethnicity }}, {{ $user->senderuser->residence }}</p>
                <b>Age & Height:</b>
                <p>{{ $user->senderuser->age }} | {{ $user->senderuser->height }}</p>
                {{-- @if($readMore == $user->id) --}}
                <b>Brief Background:</b>
                <p>
                    {{ $user->senderuser->about }}
                </p>
                <b>What I Am Looking For In A Potential Spouse:</b>
                <p>
                    {{ $user->senderuser->potential_spouse }}
                </p>
                <b>Ulema (Scholars) I Listen To:</b>
                <p>
                    @foreach($user->senderuser->userScholars as $item)
                    {{ $item->name }},
                    @endforeach
                    @if(isset($user->other_scholars))
                {{$user->other_scholars}},
            @endif
                </p>
                <b>Any Other Important Information:</b>
                <p>
                    {{ $user->senderuser->any_other_information }}
                </p>

                {{-- @endif
                @if(!$readMore)
                <button style="color: #224794;" wire:click="expand({{ $user->id }})"><i class="fa fa-plus"></i> More
                Detail</button>
                @else
                <button style="color: #224794;" wire:click="expand({{ $$user->id }})"><i class="fa fa-minus"></i>
                    Collapse</button>
                @endif --}}
            </div>
            @if($user->status == 'new')
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <a wire:click="sendReq({{ $user->user->id }})" style="color: red;cursor: pointer;">
                    <div class="customalink" style="text-align: center;">
                        <i class="fa fa-close" style="color:#224794;"></i><b style="padding-left: 10px;">Cancel</b>
                    </div>
                </a>
            </div>

            {{-- /// --}}
            @elseif($user->status == 'in-process')
            @if($buyStatus || session('message'))
            <div class="modal" style="display:block;">
                <div class="modal-content" style="color:black;padding-bottom:80px;">
                    <div>
                        <div style="text-align: right;">
                            <span class="close" wire:click="cencel()"> &times;</span>
                            {{-- <span on></span>  --}}
                        </div>
                        <b style="text-align: center;">Cancel Request</b>
                    </div>
                    <div class="row">
                        @if(session('message'))
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-success">
                                {{session('message')}}
                            </div>
                        </div>
                        @endif
                        @if(!session('message'))
                        <div class="col-md-8" style="text-align: left;">
                            Are you sure you want cancel this proposal
                        </div>
                        @endif

                    </div>
                    <br>

                    <div class="col-md-8 custom_buy" style="padding:0px;padding-top:10px;text-align:left;">
                        @if(!session('message'))
                        <button wire:click="cacnelrequest({{ $user->id }})" wire:loading.attr='disabled'
                            wire:target='cacnelrequest' class="buy_custom"
                            style="padding-left:10px;padding-right:10px;color:red;border:none;"> Send
                            <div style="float: left;padding-left:3px;" wire:loading wire:target="cacnelrequest">
                                Loading
                            </div>
                        </button>
                        @endif
                        <button wire:click="cencel()" class="buy_custom"
                            style="padding-left:10px;padding-right:10px;color:red;border:none;">No</button>
                    </div>

                </div>
            </div>
            @endif
            @if($buyAccept)
            <div class="modal" style="display:block;">
                <div class="modal-content" style="color:black;padding-bottom:80px;">
                    <div>
                        <div style="text-align: right;">
                            <span class="close" wire:click="cancel"> &times;</span>
                            {{-- <span on></span>  --}}
                        </div>
                        <b style="text-align: center;">Proposal</b>
                    </div>
                    <div class="row">
                        @if(session('message'))
                        <div class="col-md-12">
                            <br>
                            <div class="alert alert-danger">
                                {{session('message')}}
                            </div>
                        </div>
                        @endif
                        @if(!session('message'))
                        <div class="col-md-8" style="text-align: left;">
                            Are you sure you want accept this proposal
                        </div>
                        @endif

                    </div>
                    <br>

                    <div class="col-md-8 custom_buy" style="padding:0px;padding-top:10px;text-align:left;">
                        @if(session('message'))
                        <a style="color: red;background:#ccc5c5;" href="{{ url('/add-ons') }}" class="buy_custom"
                            style="padding-left:10px;padding-right:10px;color:red;border:none;"> Buy now

                        </a>
                        @endif
                        <button wire:click="acceptrequest({{ $user->id }})" wire:loading.attr='disabled'
                            wire:target='acceptrequest' class="buy_custom"
                            style="padding-left:10px;padding-right:10px;color:red;border:none;"> Yes
                            <div style="float: left;padding-left:3px;" wire:loading wire:target="acceptrequest">
                                Loading
                            </div>
                        </button>

                        <button wire:click="cencel()" class="buy_custom"
                            style="padding-left:10px;padding-right:10px;color:red;border:none;">Close</button>
                    </div>

                </div>
            </div>
            @endif
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <button wire:click="acceptReq" style="color: red;cursor: pointer;width:100%;">
                    <div class="customalink" style="text-align: center;">
                        <i class="fa fa-check" style="color:#224794;"></i><b style="padding-left: 10px;">Accept</b>
                    </div>
                </button>
                <a wire:click="chkstatus({{ $user->id }})" style="color: red;cursor: pointer;">
                    <div class="customalink" style="text-align: center;">
                        <i class="fa fa-close" style="color:#224794;"></i><b style="padding-left: 10px;">Cacbel</b>
                    </div>
                </a>
            </div>
            @else
            <div style="padding-top: 10px;padding-bottom: 10px;">
                <div>
                    <div class="customalink" style="text-align: center;color:red;">
                        @if($user->status == 'Unsuccessfull')
                        Unsuccessful Match Request
                        @else
                        <b style="padding-left: 10px;">{{ $user->status }}</b>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach

    @endif
</div>
