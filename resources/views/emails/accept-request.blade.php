{{-- <p>Welcome</p>
<p>Accept Request</p>

<p><b>{{ $data['receiver_profile_code'] }}</b> has been accept request against {{ $data['sender_profile_code'] }}<b></b></p>

<b>Profile View</b><br>--}}
Your match request to profile {{ $data['receiver_profile_code'] }} has been successful!
<br>
<a href="{{ url('/profile-view/') }}/{{ $data['id'] }}">{{ url('/profile-view') }}/{{ $data['id'] }}</a> 
</br>
BarakAllāhu Feekum, MySalafiSpouse team.