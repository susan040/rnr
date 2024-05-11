<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register at RNR</title>
    <link rel="stylesheet" href="{{ asset('login.css') }}">
</head>

<body>
    <div class="login-container">
        <div class="login-box">
            <h2>Register at RNR</h2>
            <form action="{{ route('register') }}" method="POST" id="login-form">
                @csrf
                <div class="form-row">
                    <input type="text" name="name" required placeholder="Name">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <input type="email" name="email" required placeholder="Email">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <input type="tel" name="phone_number" required placeholder="Phone Number">
                    @error('phone_number')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <input type="text" name="shop_address" required placeholder="Shop Address">
                    @error('shop_address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <input type="text" name="shop_name" required placeholder="Shop Name">
                    @error('shop_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <input type="password" name="password" required placeholder="Password">
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-row">
                    <input type="password" name="password_confirmation" required placeholder="Confirm Password">
                    @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit">Submit</button>
                <br>
                <br>
                <br>
                <a href="{{ url('/login') }}">Already Have an account</a>
            </form>
        </div>
    </div>
</body>

</html>
