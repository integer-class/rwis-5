@extends('layouts.auth')

@section('title', 'Login Warga')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush

@section('main')
    <div class="card card-primary">
        <div class="card-header">
            <h4>Login</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ url('login_process') }}" class="needs-validation" novalidate="">
                @csrf
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input id="nik" type="nik"
                        class="form-control @error('nik')
                        is-invalid
                    @enderror"
                        name="nik" tabindex="1" required autofocus>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        @enderror

                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>

                    </div>
                    <input id="password" type="password"
                        class="form-control @error('password')
                        is-invalid
                    @enderror"
                        name="password" tabindex="2">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        @enderror

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Login
                        </button>
                    </div>
            </form>


        </div>
    </div>
    <div class="text-muted mt-5 text-center">
        Don't have an account? <a href="{{ route('register') }}">Create One</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush