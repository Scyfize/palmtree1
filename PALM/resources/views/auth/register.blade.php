@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-column"
        style="
            background-image: url('{{ asset('storage/assets/profile.png') }}');
            no-repeat center center; background-size: cover; height:100vh;">
        <div class="text-center" style="color: white">
            <h1>Welcome to PalmTree</h1>
            <h1>This is where your journey begins!</h1>
            <br>
        </div>
        <div class="card p-4"
            style="max-width: 500px; width: 100%; background-color: rgba(255, 255, 255, 0.9); border: none; border-radius: 15px;">
            <h1 class="text-center mb-4">Your Profile</h1>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <!-- Name Input -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required
                        style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control" required
                        style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required
                        style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required
                        style="border-radius: 10px;">
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_pw" name="conf_pw" class="form-control" required
                        style="border-radius: 10px;">
                </div>

                <button type="submit" class="btn btn-success w-100" style="border-radius: 10px;">Register!</button>
                <br>
                <br>
                <a href="{{ route('register') }}" class="btn btn-primary w-100">Already have an account? Login here!</a>
            </form>
        </div>
    </div>
@endsection

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" name="name" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input type="text" id="username" class="form-control" name="username" required autocomplete="username">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>
                            <div class="col-md-6">
                                <input type="email" id="email" class="form-control" name="email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" name="password" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <a class="btn btn-link" href="{{ route('login') }}">Already have an account? Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
