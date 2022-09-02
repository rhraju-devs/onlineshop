

# You have a new contact email from your website. <br><br>
###  ***Name :*** onlineshopbd<br>
###  ***Email :*** onlinehopbd@gmail.com<br>
###  ***Subject :*** Chaning Password<br>


Dear *{{$email}}*, <br>

###  ***You are requesting for changing your password. Please click the link bellow to change password.***<br>
<br>
# You can reset password from bellow link: <br><br>

<a href="{{ route('frontend.customer.newresetpassword', $token) }}">Reset Password</a>
# Thank you {{$email}}, for connecting us.

Thanks,<br>
{{ config('app.name') }}

<h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="">Reset Password</a>