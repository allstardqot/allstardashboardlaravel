<h1>Hi, {{ $name }}</h1>
<p>You have been invited by {{ $name }} to join Pool {{ $pool_name }} for Gameweek [gameweek date]. </p>
<p>The pool details are as per below:</p>
<table>
<tr><td>Team Name</td><td>[User team name]</td></tr>
<tr><td>Pool Type</td><td>[pool type]</td></tr>
<tr><td>Participants</td><td>[no. of Participants]</td></tr>
<tr><td>Total AFC in Pool</td><td>[total AFC in pool from all users]</td></tr>
</table>
<p>To accept the invite, please click on the link below and complete the steps:</p>

<a href="{{ url('/') }}">Click Here, Join</a>