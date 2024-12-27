@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-center align-items-center flex-column"
        style="
            background-image: url('{{ asset('storage/assets/profile.png') }}');
            no-repeat center center; background-size: cover; height:100vh;">
        <div class="text-center" style="color: white">
            <h1>Welcome to PalmTree</h1>
            <h1>Let's continue our journey!</h1>
            <br>
        </div>
        <div class="card p-4"
            style="max-width: 500px; width: 100%; background-color: rgba(255, 255, 255, 0.9); border: none; border-radius: 15px;">
            <h1 class="text-center mb-4">Your Profile</h1>

            @if (session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <!-- Email Input -->
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

                <button type="submit" class="btn btn-success w-100" style="border-radius: 10px;">Sign In!</button>
                <br>
                <br>
            </form>
            <a href="{{ route('register') }}" class="btn btn-primary w-100">Didnt have an account? Register here!</a>
        </div>
    </div>
@endsection
