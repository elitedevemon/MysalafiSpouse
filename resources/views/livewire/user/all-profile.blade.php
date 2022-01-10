@if(!$filter)
<div class="defaultsitecolor" style="padding-bottom: 60px;text-align:center;width:100%;">
    <h1>See All Profiles</h1>
    <div>
        <div class="customalink">
            <a href="{{ url('/all-profile?filter=UK Base') }}" style="color: red;">See All UK Profiles
                <img src="{{ url('/UK.png') }}" style="width: 20px;">
            </a>
        </div>
    </div>
    <div style="padding-top: 38px;">
        <div class="customalink">
            <span>
                <img style="margin-top: 0px;width: 30px;" src="{{ url('/WORLD.png') }}">
            </span>
            <a href="{{ url('/all-profile?filter=all') }}" style="color: red;">See All Profiles
                <img src="{{ url('/UK.png') }}" style="width: 20px;">
            </a>
        </div>
    </div>
    <div style="padding-top: 38px;" class="cusrespon">
        <div class="customalink">
            <span>
                <img style="margin-top: 0px;width: 30px;" src="{{ url('/WORLD.png') }}">
            </span>
            <a href="{{ url('/all-profile?filter=International') }}" style="color: red;">See All International
                Profiles <span class="d-md-none"><br></span>(Non-UK Profiles)
            </a>
        </div>
    </div>
</div>
@endif
{{-- <div style="width: 100%;color:white;text-align:center;">
    <h1>See All Profiles</h1>
    <div class="defaultsitecolor" style="width: 20%;display:inline-block">
        asd
    </div>
    <div class="defaultsitecolor" style="padding-bottom: 60px;text-align:left;width:50%;">
       
        <div style="background: white;color:black;padding: 25px 75px 25px 75px;">
            <h3>Profile Code: #M234</h3>
            <b>Ethnicity & Residence:</b>
            <p>Waqar iiyas, Pakistan Lahore</p>
            <b>Age & Height:</b>
            <p>38 | 6ft 2</p>
            <b>Brief Background: </b>
            <p>I am practcing muslim man  with education  (lectareu) backgroun.I am practcing muslim man  with education  (lectareu) backgroun.I am practcing muslim man  with education  (lectareu) backgroun.I am practcing muslim man  with education  (lectareu) backgroun.I am practcing muslim man  with education  (lectareu) backgroun.</p>
        </div>
    </div>
    <div class="defaultsitecolor" style="width: 20%;">
    asd
    </div>
</div> --}}
@if($filter)
<div class="fusion-row" style="padding-top: 20px;padding-bottom:20px;">
    {{-- <div class="col-md-2 col-md-2-5" style="color:white;">
      
        <div class="circle"><b>{{ $balance }}</b></div>
<h4 style="margin: 0px;padding-bottom: 25px;padding-top: 10px;"> Remaining Request</h4>
</div> --}}

<div class="col-md-2" style="padding-bottom: 10px;">
    {{-- <input type="text" placeholder="Search words..." autofocus wire:model="search" wire:keyup="getSearchData()"> --}}

</div>


<div class="col-md-8">
    {{-- <div class="circle"><b>{{ $balance }}</b></div> --}}
<h3 style="color: white;">Search for a Profile:</h3>
<h5 style="margin: 0px;padding-bottom: 25px;padding-top: 10px;color:white;"> Match Request(s) Remaining: <b
        style="color: red">{{ '('.$balance.')' }}</b></h5>
<label for="" style="color: white;font-weight: 100;">Ethnicity</label>
<div style="width: 100%;">
    <select wire:model.defer="ethincityeSelect"
        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;">
        <option value="" hidden>Select</option>
        {{-- @php $property_types = []; @endphp --}}
        @foreach($ethincity as $item)
        <option value="{{ $item->ethnicity }}">
            {{ $item->ethnicity }}
        </option>
        @endforeach
    </select>
</div>
@if($filter == 'all' || $filter == 'International')
<label for="" style="color: white;font-weight: 100;">Country</label>
<div style="width: 100%;">
    <select wire:model.defer="residenceSelect"
        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;">
        <option value="" hidden>Select</option>
        @php $property_types = []; @endphp
        @foreach($residence as $item)
        @php $vari = strstr($item->residence, ',', false);
        $fin =substr($vari, 1)
        @endphp
        {{-- {{  }} --}}
        {{-- {{ substr($vari, 1) }} --}}
        @php
        if ( in_array($fin, $property_types) ) {
        continue;
        }
        $property_types[] = $fin;

        @endphp
        @if($fin)
        <option value="{{ $item->residence }}">
            {{-- {{ substr($item->residence, 0, strpos($item->residence, ','))  }} --}}
            @php
            // if($fin)
            // {
            echo $fin;
            // }
            @endphp
            {{-- {{ $result[$fin[$item['id']]][] = $fin; }} --}}
            {{-- {{ $item->residence }} --}}
            {{-- {{ preg_split("/,/",$item->residence) }} --}}
        </option>
        @endif
        @endforeach
    </select>
</div>
@endif
@if($filter == 'UK Base')
<label for="" style="color: white;font-weight: 100;">Residence</label>
<div style="width: 100%;">
    <select wire:model.defer="residenceSelect"
        style="width: 100%;height: 30px;border-radius: 0px;padding-left: 11px;border-color:#224794;">
        <option value="" hidden>Select</option>
        @php $property_types = []; @endphp
        @foreach($residenceuk as $item)
        {{-- @endphp --}}
        @php
        $data = substr($item->residence, 0, strpos($item->residence, ','))
        @endphp
        @php
        if ( in_array($data, $property_types) ) {
        continue;
        }
        $property_types[] = $data;

        @endphp
        @if($data)
        <option value="{{ $item->residence }}">
            {{ $data }}
        </option>
        @endif
        @endforeach
    </select>
</div>
@endif
<div style="width: 100%;padding-top: 0px;">
    <label for="" style="color: white;font-weight: 100;">Age</label>
    <input style="border-radius: 0px;height: 27px;" type="number" placeholder="Age from" wire:model.defer="age_from">
</div>
<div style="width: 100%;padding-top: 15px;">
    <input style="border-radius: 0px;height: 27px;" type="number" placeholder="Age to" wire:model.defer="age_to">
</div>
<div style="padding-top: 10px;padding-bottom: 10px;">
    <a wire:click="getSearchData()" style="color: red;cursor: pointer;">
        <div class="customalink" style="text-align: center;">
            <i class="fa fa-search" style="color:#224794;"></i><b style="padding-left: 10px;">Search
            </b>
        </div>
    </a>
</div>

@foreach($users as $user)
<div>
    <div style="background: white;text-align:center;padding:25px;border-radius: 10px;">
        <img style="width: 170px;" src="{{ url('/site/images/3e.png') }}" alt="">
        <h3>Profile Code: {{ $user->profile_code }}</h3>
        <b>Ethnicity & Residence:</b>
        <p>{{ $user->ethnicity }}, {{ $user->residence }}</p>
        <b>Age & Height:</b>
        <p>{{ $user->age }} | {{ $user->height }}</p>
        {{-- @if($readMore == $user->id) --}}
        <b>Brief Background: </b>
        <p>
            {{ $user->about }}
        </p>
        <b>What I Am Looking For In A Potential Spouse:</b>
        <p>
            {{ $user->potential_spouse }}
        </p>
        <b>Ulema (Scholars) I Listen To:</b>
        <p>
            @foreach($user->userScholars as $item)
            {{ $item->name }},
            @endforeach
            @if(isset($user->other_scholars))
                {{$user->other_scholars}},
            @endif
        </p>
        <b>Any Other Important Information:</b>
        <p>
            {{ $user->any_other_information }}
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
    <div style="padding-top: 10px;padding-bottom: 10px;">
        <a wire:click="sendReq({{ $user->id }})" style="color: red;cursor: pointer;">
            <div class="customalink" style="text-align: center;">
                <i class="fa fa-send" style="color:#224794;"></i><b style="padding-left: 10px;">Match
                    Request</b>
            </div>
        </a>
    </div>
</div>
@if($sendreq == 'true'.$user->id)
<div class="modal" style="display:block;">
    <div class="modal-content" style="color:black;padding-bottom:45px;">
        <div>
            <div style="text-align: right;">
                <span class="close" wire:click="closemodel('true')"> &times;</span>
                {{-- <span on></span>  --}}
            </div>
            @if(!session('djkhasdkljh'))
            @if(!session('zerobalance'))
            @if(!session('sendReq'))
            @if(!session('previous'))
            <h4 style="text-align: center;color:red;">MATCH REQUEST THIS PROFILE!</h4>
            @endif
            @endif
            @if(session('sendReq'))
            <h4 style="text-align: center;color:red;">Match Request Sent!</h4>
            @endif
            @else
            <h4 style="text-align: center;color:red;">
                @if($reciver_user->type == 'UK Base')
                ADDITIONAL MATCH REQUEST!
                @else
                INTERNATIONAL MATCH REQUEST!
                @endif

            </h4>
            @endif
            @endif
            @if(session('previous'))
            <h4 style="text-align: center;color:{{ Auth::user()->gender == "Male"?'blue':'#FF66C4' }}; font-size: 25px; font-weight: bolder; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin-bottom: 0px;">{{ Session::get('previous') }}</h4>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(!session('zerobalance'))
                @if(!session('sendReq'))
                @if(!session('djkhasdkljh'))
                @if(!session('previous'))
                <p style="color:blue;text-align:center;">Would like to proceed with this Match Request?</p>
                @endif
                @endif
                @endif
                @if(session('djkhasdkljh'))
                <h3 style="color:blue;text-align:center;">{!! session('djkhasdkljh') !!}</h3>
                @endif
                @if(session('sendReq'))
                <p style="color:blue;text-align:center;">
                    Your Match Request has been sent.
                </p>
                <p style="color:blue;text-align:center;">
                    Please check your Match Request Updates page on the portal / your email inbox for further updates
                    regarding this Match Request



                </p>
                {{-- <p> --}}
                <p style="color:blue;text-align:center;">
                    BarakAllāhu Feekum,</p>
                <p style="color:blue;text-align:center;">
                    MySalafiSpouse team</p>
                @endif
                @else
                <p style="color:blue;text-align:center;">

                    @if(Auth::user()->type == 'UK Base' && $reciver_user->type == 'UK Base')
                    We highly recommend all our applicants to match request multiple profiles at once, in order to
                    increase their potential in finding a successful match by achieving a faster response!
                    <br>
                    <br>
                    If you would like to request/accept multiple match requests at one time, then there is an additional
                    fee of just £{{ $config->match_request_fee_euro }} per synchronous match, as your current package
                    enables you to match/match request with x1 profile at a time.
                    <br>
                    <br>
                    Your current package allows you to match/match request just 1 profile at a time.
                   
                    You have selected to match with an additional profile.
                   
                    Would you like to proceed with the additional match request + fee payment?
                    @elseif(Auth::user()->type == 'UK Base' && $reciver_user->type != 'UK Base')
                    This profile is available for marriage.
                    <br>
                    Your current package covers unlimited UK match requests.
                    <br>
                    We charge a small fee of just £{{ $config->match_request_fee_euro }} for our UK applicants to
                    request an international profile.

                    <br>

                    @else
                    We highly recommend all our applicants to match request multiple profiles at once, in order to
                    increase their potential in finding a successful match by achieving a faster response!

                    If you would like to request/accept multiple match requests at one time, then there is an additional
                    fee of just <b>${{ $config->match_request_fee }}</b> USD/15€ per synchronous match, as your current
                    package enables you to match/match request with x1 profile at a time.

                    Your current package allows you to match/match request just 1 profile at a time.

                    You have selected to match with an additional profile.

                    Would you like to proceed with the additional match request + fee payment?
                    @endif
                </p>
                @endif
                {{-- @if(!session('previous') && !session('susscessMessage'))
               
                @endif --}}
                {{-- @if(session('susscessMessage'))
                <h6 style="color:green;">{{session('susscessMessage')}}</h6>
                @endif --}}
                @error('errorMessage')
                <h6 style="color:red;">{{ $message }}</h6>
                @enderror
                {{-- @error('susscessMessage')
                <h6 style="color:green;">{{ $message }}</h6>
                @enderror --}}
            </div>
        </div>
        <br>
        {{-- <div class="col-md-1"></div> --}}
        {{-- <div class="col-md-12 custom_buy" style="padding:0px;padding-top:20px;text-align:center;"> --}}
        @if(!session('djkhasdkljh'))
        @if(!$reqsuccess && !session('previous'))
        @if(!session('zerobalance'))
        <div style="text-align: center;">
            <button wire:click="send({{ $user->id }})" wire:loading.attr='disabled' wire:target='send'
                class="buy_custom" style="padding:15px;color:green;border:none;"> Yes, Match Request this profile!
                <div style="text-align:center;" wire:loading wire:target="send">
                    Loading
                </div>
            </button>
        </div>
        @endif
        @endif
        @if(session('zerobalance'))
        <div style="text-align: center;">
            <a href="{{ url('/add-ons') }}" class="buy_custom" style="padding:15px;color:green;border:none;">
                @if($reciver_user->type == 'UK Base')
                Yes, I would like to proceed: Purchase Additional Match Request.
                @else
                Yes, I would like to proceed: Purchase International Match Request.
                @endif
            </a>
        </div>
        @endif
        @endif
        @if(!$reqsuccess && session('previous'))
        {{-- <button wire:click="unsuccessfull({{ $user->id }})" wire:loading.attr='disabled'
        wire:target='unsuccessfull'
        class="buy_custom" style="padding-left:10px;padding-right:10px;color:red;border:none;"> UnSucessfull
        <div style="float: left;padding-left:3px;" wire:loading wire:target="unsuccessfull">
            Loading
        </div>
        </button> --}}
        <div>

        </div>
        <div style="text-align: center; background-color: white;">
            <button wire:click="inprocess({{ $user->id }})" wire:loading.attr='disabled' wire:target='inprocess'
                class="buy_custom" style="padding-left:10px;padding-right:10px;color:rgb(255, 155, 5); border: 5px solid #f5823b; border-radius: 15px; font-size: 20px; background-color: white;">
                It went well, we are still in marriage talks.
                <div style="text-align:center;" wire:loading wire:target="inprocess">
                    Loading-
                </div>
            </button>
            <button style="margin-top: 30px;color:red; border: 5px solid red; border-radius: 15px; font-size: 20px; background-color: white;" wire:click="unsuccessfull({{ $user->id }})"
                wire:loading.attr='disabled' wire:target='unsuccessfull' class="buy_custom"> It was unsuccessful, we are no
                longer in marriage talks. You may confirm this information with the Wali <br> (female guardian) also.
                <div style="float: left;padding-left:3px;" wire:loading wire:target="unsuccessfull">
                    Loading-
                </div>
            </button>
        </div>

        @endif
        {{-- </div> --}}
        {{-- <div class="col-md-12 custom_cancel" style="color: red;border:none;padding: 0px;padding-top:20px;"> --}}
        @if(!session('sendReq'))
        @if(!session('djkhasdkljh'))
        @if(!session('previous'))
        <div style="text-align: center;">
            <button style="margin-top:30px;color: red;border:none;padding:15px;" wire:click="closemodel('true')">No, I
                have changed my mind.</button>
        </div>
        @endif
        @endif
        @endif
        {{-- </div> --}}
    </div>
</div>
@endif
@endforeach


</div>


</div>


@endif
