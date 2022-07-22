{{-- <h1>Hi, {{ $name }}</h1>
<p>You have been invited by {{ $name }} to join Pool {{ $pool_name }} for Gameweek {{$starting_at}} To {{$ending_at}}. </p>
<p>The pool details are as per below:</p>
<table>
<tr><td>Pool Type</td><td>{{$type}}</td></tr>
<tr><td>Participants</td><td>{{$max_participants}}</td></tr>

@php
    $password = !empty($pass) ? '<tr><td>Password </td><td>'.$pass.'</td></tr>' : '' ;
@endphp
{!! $password !!}
<tr><td>Total AFC in Pool</td><td>{{$entry_fees}}</td></tr>
</table>
<p>To accept the invite, please click on the link below and complete the steps:</p> --}}
{!! $message1!!}

<a href="{{ url('/home') }}">Click Here, Join</a>