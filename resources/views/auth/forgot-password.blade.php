@extends('layouts.frontend.app')
@push('title') Forgot Password @endpush
@section('content')
    <div class="login-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-content">
                        <div class="login-title">
                            <h4>Forgot Password</h4>
                            <p>
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </p>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('password.email') }}" method="post">
                                @csrf
                                <input name="email" placeholder="Email" type="email" title="Enter your email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="button-remember">
                                    <button class="login-btn" type="submit">Email Password Reset Link</button>
                                </div>
                                <div class="new-account">
                                    <p>new here ? <a href="{{ route('register') }}">Create an new account .</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
