<!DOCTYPE html>
<html lang="en">
<head>
@include('includes.head')
</head>
<body>
    <div class="container text-center">
        <h2>E Shopper</h2>
        <h3>Thank you for Registering!</h3>
        <h4>Your Login Credentials</h4>
        <p>Email : {{$details['email']}}</p>
        <p> Password : {{$details['password']}}</p>
        </div>
    @include('includes.foot')
</body>
</html>
