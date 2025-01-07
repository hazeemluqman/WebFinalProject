@extends('layouts.app')

@section('content')
<style>
body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f9f9f9;
}

.form-wrapper {
    width: 400px;
    padding: 20px;
    border: 3px solid #f1f1f1;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.form-wrapper h2 {
    text-align: center;
    margin-bottom: 20px;
}

input[type=text],
input[type=email],
input[type=password] {
    width: 100%;
    padding: 12px 15px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    background-color: #04AA6D;
    color: white;
    padding: 14px;
    margin-top: 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    background-color: #f44336;
    width: 100%;
    margin-top: 10px;
    padding: 10px;
}

.text-center a {
    color: #007bff;
    text-decoration: none;
}

.text-center a:hover {
    text-decoration: underline;
}

@media screen and (max-width: 768px) {
    .form-wrapper {
        width: 90%;
    }
}
</style>

<div class="container d-flex justify-content-center align-items-center">
    <div class="form-wrapper">
        <h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name"><b>Name</b></label>
                <input id="name" type="text" placeholder="Enter Name"
                    class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                    required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="email"><b>Email Address</b></label>
                <input id="email" type="email" placeholder="Enter Email"
                    class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                    required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="password"><b>Password</b></label>
                <input id="password" type="password" placeholder="Enter Password"
                    class="form-control @error('password') is-invalid @enderror" name="password" required
                    autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="password-confirm"><b>Confirm Password</b></label>
                <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                    name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary w-100">Register</button>
            </div>

            <div class="form-group mt-3 text-center">
                <button type="button" class="cancelbtn">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection