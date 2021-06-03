@extends('layouts.frontend.app')
@push('title') Confirm Password @endpush
@section('content')
    <div class="login-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="login-content">
                        <div class="login-title">
                            <h4>Confirm Password</h4>
                            <p>Please confirm your password before continuing.</p>
                        </div>
                        <div class="login-form">
                            <form action="{{ route('password.confirm') }}" method="post">
                                @csrf
                                <input name="password" placeholder="Password" type="password" title="Enter your password" required>
                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                                <div class="button-remember">
                                    <button class="login-btn" type="submit">Confirm</button>
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
