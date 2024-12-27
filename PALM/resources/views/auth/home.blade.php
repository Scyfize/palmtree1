@extends('layouts.master')

@section('content')
    <style>
        .greeting-container {
            display: inline-block;
            /* Ensures the element respects width constraints */
            min-width: 100px;
            /* Set based on the longest greeting */
            text-align: center;
            /* Optional: centers text within the container */
            transition: opacity 0.5s ease-in-out;
            /* Smooth transitions */
        }

        .greeting-container.fade-out {
            opacity: 0;
            /* Fade effect for transitions */
        }
    </style>
    <div class="bg-image"
        style="height: 100vh; background-image: url('{{ asset('storage/assets/home.png') }}'); top: 0;             background: linear-gradient(rgba(0, 0, 0, 0.5),
                    /* Dark overlay */
                    rgba(0, 0, 0, 0.5)),
                font-family: Arial, sans-serif;">
        <div style="text-align: center; color: white; height: 100vh"
            class="d-flex justify-content-center align-items-center flex-column">
            <br>
            @auth
                <div class="greeting">
                    <h1>
                        <span id="dynamic-greeting" class="greeting-container">Hi</span>, {{ Auth::user()->name }}!
                    </h1>
                </div>

            @endauth
            <h1>Welcome to PalmTree!</h1>
            <h1>Learn and discuss all Computer Science Related Topic!</h1>
        </div>
    </div>
    <div class="mt-5" style="background-color: white; padding: 50px; border-radius: 10px; height:100vh; text-align: center">
        <div>
            <h2>Courses that might interest you and are free to <span class="text-success">Take</span></h2>
            <div class="row mt-4">
                @foreach ($articles as $article)
                    <div class="col-md-4">
                        <div class="card" style="min-height: 355px;">
                            <img src="{{ asset('storage/assets/' . $article->image_url) }}" class="card-img-top"
                                alt="{{ $article->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                                <br>
                                <a href="{{ url('articles/' . $article->id) }}"
                                    style="text-decoration: none; color: white; border-radius: 15px;"
                                    class="bg-primary p-2">Take Course
                                </a>
                                <br>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <br>
        <div class="mt-5">
            <h2>Learn and grow together by joining our community in the  <span class="text-success">Forums</span></h2>
            <div class="row">
                @foreach ($forums->slice(0, 3) as $forum)
                    <div class="col-md-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <!-- Placeholder user avatar -->
                                <img src="https://www.w3schools.com/w3images/avatar{{ $forum->user_id }}.png"
                                    class="card-img-top" alt="User Avatar"
                                    style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">

                                <h5 class="card-title mt-3">User {{ $forum->user_id }}</h5>
                                <h6 class="card-title">{{ $forum->title }}</h6>
                                <p class="card-text">{{ $forum->body }}</p>
                                <small class="text-muted">Posted on {{ $forum->created_at->format('M d, Y') }}</small>
                                <br>
                                <a href="/forums" class="btn btn-link mt-2">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const greetings = ["Hi", "Bonjour", "Hola", "Ciao", "Namaste", "Salam",
            "Guten Tag"]; // Add more greetings
            const greetingElement = document.getElementById("dynamic-greeting");
            let index = 0;

            setInterval(() => {
                greetingElement.classList.add("fade-out");

                // Change the greeting after the fade-out animation
                setTimeout(() => {
                    index = (index + 1) % greetings.length;
                    greetingElement.textContent = greetings[index];
                    greetingElement.classList.remove("fade-out");
                }, 500); // Sync this with the fade-out duration in CSS
            }, 2000); // Change every 2 seconds
        });
    </script>
@endsection
