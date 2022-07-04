<h1>Hi {{ucfirst($user)}},</h1>

<p>Welcome to Fantasy Allstars</p>
<p>To verify your email address and activate your account, 
please click the following link:</p>
<a href="{{ route('ResetPasswordGet', $token) }}">Reset Password</a>

<p>Thanks</p>
<p>Saleem from Allstars</p>