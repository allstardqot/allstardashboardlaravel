<h1>Hi, {{ ucfirst($name) }}</h1>
<p>Congratulations, you have joined Pool {{$pool_name}} for Gameweek {{$starting_at}} To {{$ending_at}}. </p>
<p>See below your pool details</p>
<table>
<tr><td>Pool Type</td><td>{{$type}}</td></tr>
<tr><td>Participants</td><td>{{$max_participants}}</td></tr>
<tr><td>Total AFC in Pool</td><td>{{$entry_fees}}</td></tr>
</table>