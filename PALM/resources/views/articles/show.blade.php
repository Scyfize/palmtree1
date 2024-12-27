@extends('layouts.master')

@section('title', $article->title)

@section('content')
    <div class="articles-page">
        <!-- Hero Section -->
        <section class="hero text-center text-white py-5"
            style="
            background-image: url('{{ asset('storage/assets/ai_1.png') }}');
            no-repeat center center; background-size: cover; height:100vh;">
            <div style="text-align: center; color: white; height: 100vh"
                class="d-flex justify-content-center align-items-center flex-column">
                <br>
                <h1 class="display-4">Introduction to <span class="text-success">{{ $article->title }}</span></h1>
                <p class="lead">Learn everything that you need to know about {{ $article->title }}</p>
            </div>
        </section>

        <!-- About AI Section -->
        <section class="about-ai text-center py-5">
            <div class="container">
                <div class="card mx-auto" style="max-width: 600px; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-body">
                        <h2 class="mb-4">What is an <span class="text-success">{{ $article->title }}</span>?</h2>
                        <p class="mb-0">
                            {{ $article->content }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="core-concepts py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-5">Core Concepts of <span class="text-success">{{ $article->title }}</span></h2>
                <div class="row">
                    @if ($article->id == 1)
                        <!-- AI Content -->
                        <!-- Machine Learning Card -->
                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">1. Machine Learning (ML):</h4>
                                    <p class="card-text">
                                        A subset of AI that enables machines to learn and improve from experience without
                                        explicit
                                        programming.
                                    </p>
                                    <p><strong>Types:</strong></p>
                                    <ul>
                                        <li>Supervised learning: Training from labeled data (e.g., predicting house prices).
                                        </li>
                                        <li>Unsupervised learning: Finding patterns in unlabeled data (e.g., clustering
                                            customer
                                            segments).</li>
                                        <li>Reinforcement learning: Learning through trial and error.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Natural Language Processing Card -->
                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">2. Natural Language Processing (NLP):</h4>
                                    <p class="card-text">
                                        The branch of AI that enables machines to interpret and respond to human language.
                                        <br>
                                        <strong>Applications:</strong>
                                        include translation services, sentiment analysis, and voice assistants.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Computer Vision Card -->
                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">3. Computer Vision:</h4>
                                    <p class="card-text">
                                        Enables machines to interpret and process visual data (images, videos).
                                    </p>
                                    <p><strong>Applications:</strong> Facial recognition, autonomous vehicles, and medical
                                        imaging.</p>
                                </div>
                            </div>
                        </div>
                    @elseif ($article->id == 2)
                        <!-- Software Engineering Content -->
                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">1. Requirements Engineering:</h4>
                                    <p class="card-text">
                                        The process of gathering and defining what the software must accomplish.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">2. Software Design:</h4>
                                    <p class="card-text">
                                        Structuring and planning a solution to meet software requirements.
                                        <br>
                                        <strong>Key Areas:</strong> Architecture design, user interface design.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">3. Testing and Quality Assurance:</h4>
                                    <p class="card-text">
                                        Ensuring the software meets quality standards before deployment.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @elseif ($article->id == 3)
                        <!-- Web Development Content -->
                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">1. Front-End Development:</h4>
                                    <p class="card-text">
                                        Building the visual and interactive elements of a website using HTML, CSS, and
                                        JavaScript.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">2. Back-End Development:</h4>
                                    <p class="card-text">
                                        Managing server-side functionality, databases, and application logic.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-body d-flex flex-column">
                                    <h4 class="card-title">3. Full-Stack Development:</h4>
                                    <p class="card-text">
                                        Combining both front-end and back-end development skills to create complete web
                                        applications.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Default Content (optional) -->
                        <div class="col-md-12">
                            <p>No content available for this article.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
