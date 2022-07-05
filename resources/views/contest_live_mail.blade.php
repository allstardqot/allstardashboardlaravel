<h1>Hi, {{ ucfirst($user_name) }}</h1>
<p>Your pool {{$pool_name}} is now live. You can monitor your progress under “My Pools” or click the link below</p>

<p><a href="{{ url('/my-pool') }}">My Pools</a></p>

<p>Best of luck Allstar</p>
