
<b>Your Email Address/Gmail?</b>
<p style="color:skyblue">{{$data['data']['email']}}</p>
<b>Your Gender?</b><br>
I am a  @if($data['data']['gender'] == 'Male') Brother (Male) @else Sister (Female) @endif
<br><br><b>Your Ethnicity & Residence?</b><br>
{{ $data['data']['ethnicity_residence'] }}
<br>
<br><b>Your Age & Height?</b><br>
<p>{{ $data['data']['age_height'] }}</p>
<b>A Brief Background About Yourself?</b>
<p>{{ $data['data']['background'] }}</p>
<b>What Are You Looking For In A Potential Spouse?</b>
<p>{{$data['data']['potential']}}</p>
<b>What Ulema (Scholars) Do You Listen To?</b>
<br>
<br>
@foreach($data['data']['scholar'] as $item)
    {{ $item }},
@endforeach
@if ($data['data']['other_scholar'])
  {{ $data['data']['other_scholar'] }}
@endif
<br>
<br>

<b>Have You Been Married Before?</b>
<p>{{$data['data']['before_married']}}</p>
<br>
{{ request()->ip()   }} | {{ date('M-d-Y h:i:A') }}
