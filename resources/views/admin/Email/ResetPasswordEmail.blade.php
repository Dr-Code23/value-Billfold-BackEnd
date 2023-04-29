<h2>Hello, Brother!</h2>
Someone, hopefully you, has requested to reset the password for your BillFold account on https://Billfold.com.
If you did not perform this request, you can safely ignore this email.
Otherwise, click the link below to complete the process.
<a href="{{route('ResetPassword',$token) . '?email=' . urlencode($email)}}">Reset password</a>
