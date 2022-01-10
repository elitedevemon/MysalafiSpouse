<!-- {{-- 

<p>{{ $data['receiver_profile_code'] }} has been shared guardian information with you</p>

<b>Profile View</b><br>
<a href="{{ url('/profile-view/') }}/{{ $data['id'] }}">{{ url('/profile-view') }}/{{ $data['id'] }}</a> --}}
Your Match Request was successful! Your Wali's details have been forwarded to {{ $data['receiver_profile_code'] }}  by our team.
Please do let us know how everything goes sis!
<br><br>
<a href="{{ url('/profile-view/') }}/{{ $data['id'] }}">{{ url('/profile-view') }}/{{ $data['id'] }}</a> --}}
<br>
BarakAllāhu Feekum,  MySalafiSpouse team. -->
You have been matched successfully! 
<br>
Your Wali's (guardian) details have been forwarded to {{ $data['receiver_profile_code'] }} - Please let us know how
everything goes sis. 
<br>
BarakAllāhu Feekum MySalafiSpouse team!
<br><br>
<a href="{{ url('/profile-view/') }}/{{ $data['id'] }}">{{ url('/profile-view') }}/{{ $data['id'] }}</a>
