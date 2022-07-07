<h1>Hi {{ucfirst($user)}},</h1>

<p>Please click the link below to reset your password.</p>
<a href="{{ route('ResetPasswordGet', $token) }}">Reset Password</a>

<p>Thanks</p>
<p>Saleem from Allstars</p>