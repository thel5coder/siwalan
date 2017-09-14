<html>
<body>
<h3>Reset Password</h3>
<p>Untuk mereset ulang password anda klik link di bawah ini</p>
<p><a href="{{route('formResetPassword',['email'=>base64_encode($email)])}}">RESET PASSWORD</a> </p>
</body>
</html>