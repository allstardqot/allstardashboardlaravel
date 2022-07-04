
<main>
<h1>Hi, User</h1>

<p>You have been invited by {{ucfirst($user_name)}} to join Allstar Fantasy.</p>
<p>Please use this link to register.</p>

<a href="{{ route('register',$referal) }}">Sign Up</a>

<p>Best of luck Allstar</p>

</main>

