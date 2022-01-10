
<div class="fusion-row" style="padding-top: 20px;padding-bottom:20px;">
    <div class="col-md-2 col-md-2-5" style="color:white;">
    </div>
    <div class="col-md-8">
        <div>
            <div style="background: white;text-align:center;padding:25px;border-radius: 10px;">
                <img style="width: 170px;" src="{{ url('/site/images/3e.png') }}" alt="">
                <h3>Profile Code: {{ $user->profile_code }}</h3>
                <b>Ethnicity & Residence:</b>
                <p>{{ $user->ethnicity }}, {{ $user->residence }}</p>
                <b>Age & Height:</b>
                <p>{{ $user->age }} | {{ $user->height }}</p>
                {{-- @if($readMore == $user->id) --}}
                <b>Brief Background:</b>
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
                @if($user->gender == 'Female' && $guardian)
                <b>Guardian information:</b>
                <p>
                    {{ $user->guardian }}
                </p>
                @endif
            </div>
         
        </div>
    </div>
</div>
