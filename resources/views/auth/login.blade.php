<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login to RNR</title>
    <link rel="stylesheet" href="{{ asset('login.css') }}">
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>Login to RNR</h2>
        <form action="{{ route('login.user') }}" method="POST" id="login-form">
            @csrf
            <div class="form-row">
                <input type="text" name="email" required="true" placeholder="Email">
                @if ($errors->has('email'))
                    <p class="text-danger">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-row">
                <input type="password" name="password" required="true" placeholder="Password">
                @if ($errors->has('password'))
                    <p class="text-danger">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <button type="submit">Submit</button>
            <br>
            <br>
            <br>
            <a href="{{ url('/register') }}">Register New Account</a>
        </form>
    </div>

</body>

</html>
