@extends('layouts.frontend.app')
@push('title') Registration @endpush
@section('content')
    <div class="login-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-content">
                        <div class="login-title">
                            <h4>register</h4>
                            <p>Please sign up using account detail bellow.</p>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <input name="name" placeholder="Full Name" type="text" title="Enter your name" value="{{ old('name') }}" required>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input name="email" placeholder="Email" title="Enter valid email" type="email" value="{{ old('email') }}" required>
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <input name="password" placeholder="Password" type="password" title="Enter new password" required>
                                <input name="password_confirmation" placeholder="Confirm Password" title="Enter confirm password" type="password" required>
                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="button-remember">
                                    <button class="login-btn" type="submit">register</button>
                                </div>
                                <div class="new-account">
                                    <p>Already have an account ? <a href="{{ route('login') }}">Login .</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
