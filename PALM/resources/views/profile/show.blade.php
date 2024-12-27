@extends('layouts.master')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="
            background-image: url('{{ asset('storage/assets/profile.png') }}');
            no-repeat center center; background-size: cover; height:100vh;">
    <div class="card p-4" style="max-width: 500px; width: 100%; background-color: rgba(255, 255, 255, 0.9); border: none; border-radius: 15px;">
        <h1 class="text-center mb-4">Update Your Profile</h1>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <!-- Display Profile Image -->
            <div class="text-center mb-3">
                {{-- @if($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="Profile Image" class="rounded-circle img-fluid mb-2" style="width: 120px; height: 120px; object-fit: cover;">
                @else
                    <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image" class="rounded-circle img-fluid mb-2" style="width: 120px; height: 120px; object-fit: cover;">
                @endif --}}
            </div>

            <!-- Name Input -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" required style="border-radius: 10px;" placeholder="{{Auth::user()->name}}">
            </div>

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required style="border-radius: 10px;" placeholder="{{Auth::user()->email}}">
            </div>

            <button type="submit" class="btn btn-success w-100" style="border-radius: 10px;">Update Profile</button>
        </form>
    </div>
</div>
@endsection
