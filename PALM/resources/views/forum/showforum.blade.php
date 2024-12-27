@extends('layouts.master')

@section('Forum')

@section('content')
    <div class="py-4 px-5"
        style="
            background-image: url('{{ asset('storage/assets/profile.png') }}');
            no-repeat center center; background-size: cover; height:100vh; background-position: center;">
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <h1 class="text-white">Forum</h1>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif
        <div class="row d-flex justify-content-center align-items-stretch flex-row">
            <!-- Create Forum Section -->
            <div class="col-md-4">
                <div class="card p-4" style="background-color: rgba(255, 255, 255, 0.9); border-radius: 15px;">
                    <h4 class="mb-3">Create Forum</h4>
                    @auth
                        <h4 class="mb-3">Hi, {{ Auth::user()->name }}! <br>What's on your mind?</h4>
                        <form action="{{ route('insertforum') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    placeholder="Enter Forum title" required style="border-radius: 10px;">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <textarea id="body" name="body" class="form-control" rows="5" placeholder="Write something..." required
                                    style="border-radius: 10px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100" style="border-radius: 10px;">Enter
                                Forum!</button>
                        </form>
                    @else
                        <h2 class="text-center my-5">You have to login first!</h2>
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">Login here!</a>
                    @endauth
                </div>
            </div>

            <!-- Forums Section -->
            <div class="col-md-8">
                <div class="card"
                    style="background-color: rgba(255, 255, 255, 0.9); border-radius: 15px; max-height: 830px; overflow-y: auto;">
                    <div class="card-body">
                        <h4 class="mb-4">Recent Forums</h4>
                        @foreach ($forums as $forum)
                            <div class="mb-4 p-3" style="background-color: #f9f9f9; border-radius: 10px;">
                                <div class="d-flex align-items-center mb-2">
                                    <img src="https://www.w3schools.com/w3images/avatar{{ $forum->user_id }}.png"
                                        class="card-img-top" alt="User Avatar"
                                        style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                                    <div class="ms-3">
                                        <strong>{{ $forum->user->name }}</strong> <br>
                                        <small class="text-muted">Date: {{ $forum->created_at->format('M d, Y') }}</small>
                                    </div>
                                </div>
                                <h5 class="mb-2">{{ $forum->title }}</h5>
                                <p>{{ $forum->body }}</p>

                                @auth
                                    @if (Auth::user()->username === 'admin' || Auth::id() == $forum->user_id)
                                        <form action="{{ route('deleteforum', $forum->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this forum?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete Forum</button>
                                        </form>
                                    @endif
                                @endauth

                                <!-- Display Comments -->
                                <h6 class="mt-4">Comments</h6>
                                @foreach ($forum->comments as $comment)
                                    <div class="p-3 mb-3" style="background-color: #e9ecef; border-radius: 10px;">
                                        <strong>{{ $comment->user->name }}</strong> <br>
                                        <small class="text-muted">{{ $comment->created_at->format('M d, Y') }}</small>
                                        <p>{{ $comment->body }}</p>

                                        @auth
                                            <!-- Show delete button if the user is the comment author or an admin -->
                                            @if (Auth::id() == $comment->user_id || Auth::user()->username === 'admin')
                                                <form action="{{ route('deletecomment', $comment->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this comment?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Delete Comment</button>
                                                </form>
                                            @endif
                                        @endauth
                                    </div>
                                @endforeach

                                <!-- Comment Form -->
                                @auth
                                    <form action="{{ route('addcomment', $forum->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <textarea name="body" class="form-control" rows="3" placeholder="Write a comment..." required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
                                    </form>
                                @endauth
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
