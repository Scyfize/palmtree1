<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project: PalmTree</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap"
        rel="stylesheet">
    <!-- Font Awesome for Icons -->

    <style>
        /* General Body Styles */
        body,
        html {
            /* height: 100%; */
            margin: 0;
            padding: 0;
            font-family: 'Roboto Mono', monospace;

        }


        /* Navbar Custom Styles */
        .navbar-custom {
            background-color: #ffffff;
            /* White background */
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        /* Navbar Links */
        .navbar-nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
            /* Space between items */
        }

        .navbar-nav .nav-item {
            width: auto;
        }

        .navbar-nav .nav-link {
            display: block;
            color: #333;
            /* Default text color */
            font-size: 1.1rem;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            transition: color 0.3s;
            /* Smooth color transition */
        }

        /* Navbar Hover Effects */
        .navbar-nav .nav-link:hover {
            color: #00FF00;
            /* Lightsaber green text on hover */
        }

        .navbar-nav .nav-link.active {
            color: #00FF00;
            /* Active link in Lightsaber green */
        }

        .navbar-nav .nav-item:first-child .nav-link {
            font-weight: bold;
        }

        /* Navbar Toggler (Hamburger) */
        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-image: url('data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"%3E%3Cpath stroke="currentColor" stroke-width="2" d="M3 7h24M3 15h24M3 23h24"%3E%3C/path%3E%3C/svg%3E');
        }

        /* Collapsed Navbar Menu (Mobile Version) */
        .navbar-collapse {
            background-color: #f8f9fa;
            /* Light background for collapsed menu */
        }

        /* Card Image */
        .card-img-top {
            height: 200px;
            /* Adjust height as necessary */
            object-fit: cover;
            /* Ensure images cover the card area properly */
        }

        /* Footer Styling */
        .footer {
            background-color: #343a40;
            /* Dark background */
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .footer h5 {
            font-size: 1.25rem;
        }

        .footer a {
            color: #00FF00;
            /* Lightsaber green links in footer */
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        /* Footer Social Links */
        .social-links a {
            display: block;
            margin-bottom: 10px;
        }

        .social-links a:hover {
            color: #00FF00;
        }

        /* Quick Links Section */
        .footer .quick-links a {
            display: block;
            margin-bottom: 8px;
            color: #adb5bd;
            text-decoration: none;
        }

        .footer .quick-links a:hover {
            color: #00FF00;
        }

        /* Responsive Design: Ensure the layout is responsive across screen sizes */
        @media (max-width: 768px) {

            /* Navbar adjustment for smaller screens */
            .navbar-nav {
                display: block;
            }

            /* Footer content layout for smaller screens */
            .footer .row {
                flex-direction: column;
            }

            .footer .col-md-4 {
                margin-bottom: 20px;
            }

            .page-content {
                padding: 10px;
            }
        }

        @media (max-width: 576px) {

            /* Adjusting navbar links for mobile */
            .navbar-nav .nav-link {
                font-size: 1rem;
                padding: 8px 10px;
            }

            .footer {
                padding: 15px 0;
            }

            .footer .social-links a {
                font-size: 0.9rem;
            }

            .footer .quick-links a {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navbar')

    <!-- Main Content -->
    <div>
        @yield('content')
    </div>

    {{-- <!-- Footer -->
    <footer class="footer bg-dark text-white py-5 mt-4">
        <div class="container">
            <div class="row text-justify">
                <!-- Connect with Us Section -->
                <div class="col-md-4">
                    <h5>Connect with Us:</h5>
                    <div class="social-links">
                        <a href="https://twitter.com" target="_blank" class="text-white d-block mb-2">
                            <i class="fab fa-twitter"></i> Twitter
                        </a>
                        <a href="https://facebook.com" target="_blank" class="text-white d-block mb-2">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://instagram.com" target="_blank" class="text-white d-block">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                    </div>
                </div>

                <!-- About Us Section -->
                <div class="col-md-4">
                    <h5>About PalmTree</h5>
                    <p>We provide an intuitive platform to connect with others, share ideas, and explore new horizons. Join us to experience the best of community and collaboration.</p>
                </div>

                <!-- Quick Links Section -->
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <p>
                        <a href="{{ url('/terms') }}" class="text-white d-block mb-2">Terms of Service</a>
                        <a href="{{ url('/privacy') }}" class="text-white d-block mb-2">Privacy Policy</a>
                        <a href="{{ url('/') }}" class="text-white d-block mb-2">Home</a>
                        <a href="{{ url('/forum') }}" class="text-white d-block">Forum</a>
                    </p>
                </div>
            </div>
        </div> --}}

    <div class="text-center bg-dark text-light py-3">
        <p class="mb-0">&copy; 2024 PalmTree - All Rights Reserved</p>
    </div>
    </footer>

    <!-- Bootstrap JS Bundle (includes Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
