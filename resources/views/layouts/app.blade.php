<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ShipExcs Courier Service</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&family=Georgia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f5f5f5;
            color: #333;
            font-family: 'Quicksand', sans-serif;
        }
        /* Header Styles */
        .header-top {
            background-color:rgb(43, 18, 63);
            color: white;
            padding: 10px 0;
            font-size: 12px;
        }
        .header-top-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 10px 20px;
        }
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 8px;
            line-height: 1.4;
        }
        .contact-info span {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .contact-info i {
            font-size: 10px;
            width: 12px;
            text-align: center;
        }
        .social-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .social-icons span {
            font-weight: bold;
        }
        .social-icons a {
            color: white;
            font-size: 16px;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color:rgb(223, 60, 1);
        }
        /* Sticky white header */
        .header-main {
            background-color: white;
            padding: 15px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .header-main-content {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }
        .logo img {
            height: 40px; /* Adjusted for mobile consistency */
        }
        .nav-menu {
            display: flex;
            gap: 30px;
            list-style: none;
        }
        .nav-menu li a {
            font-size: 16px;
            color: #666;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s;
        }
        .nav-menu li a:hover,
        .nav-menu li a.active {
            color:rgb(221, 59, 0);
        }
        /* Mobile dropdown */
        .mobile-menu-toggle {
            display: none;
            background-color:rgb(45, 16, 83);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 700;
        }
        .mobile-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 20px;
            background-color: white;
            min-width: 200px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            border-radius: 4px;
            z-index: 1000;
        }
        .mobile-dropdown a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-weight: 700;
        }
        .mobile-dropdown a:hover {
            background-color:rgb(235, 63, 0);
            color: white;
        }
        .mobile-dropdown.show {
            display: block;
        }
        /* Content */
        .content {
            min-height: calc(100vh - 300px); /* Adjust based on actual header/footer height */
            background-color: white;
            margin: 20px auto;
            max-width: 1200px;
            padding: 40px 20px;
        }
        /* Newsletter Section (if used in app layout) */
        .newsletter-section {
            background-color: white;
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
            border: 3px solid #c8e6c9;
        }
        .newsletter-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .newsletter-text h3 {
            color:rgb(245, 65, 0);
            font-size: 18px;
            margin-bottom: 5px;
        }
        .newsletter-text p {
            color: #666;
            font-size: 14px;
        }
        .newsletter-form {
            display: flex;
            gap: 0;
        }
        .newsletter-form input {
            padding: 12px 15px;
            border: 1px solid #ddd;
            background-color: #f0f0f0;
            width: 250px;
            font-size: 14px;
        }
        .newsletter-form button {
            padding: 12px 20px;
            background-color:rgb(212, 57, 0);
            color: white;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }
        /* Footer Styles */
        .footer {
            background-image: url('{{ asset('images/image1.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-color: #2c2c2c;
            color: white;
            padding: 40px 0 0 0;
            position: relative;
        }
        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(44, 44, 44, 0.8);
            z-index: 1;
        }
        .footer-content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 40px;
        }
        .footer-section h3 {
            color: white;
            margin-bottom: 20px;
            font-size: 18px;
            font-family: 'Georgia', serif;
        }
        .footer-section p {
            color: #ccc;
            line-height: 1.6;
            font-size: 14px;
        }
        .footer-section ul {
            list-style: none;
        }
        .footer-section ul li {
            margin-bottom: 10px;
        }
        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
        }
        .footer-section ul li a:hover {
            color:rgb(216, 58, 0);
        }
        .company-info .logo-footer img {
            height: 50px;
            margin-bottom: 15px;
        }
        .company-tagline {
            color:rgb(212, 57, 0);
            font-size: 12px;
            margin-bottom: 15px;
        }
        .footer-social {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        .footer-social a {
            color: white;
            font-size: 24px;
            transition: color 0.3s;
        }
        .footer-social a:hover {
            color:rgb(223, 59, 0);
        }
        .payment-methods {
            display: flex;
            gap: 15px;
            margin-top: 15px;
            flex-wrap: wrap;
            align-items: center;
        }
        .payment-icon {
            width: 50px;
            height: 30px;
            background-color: white;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 10px;
            color: #333;
        }
        .visa { background-color: #1a1f71; color: white; }
        .mastercard { background-color: #eb001b; color: white; }
        .amex { background-color: #006fcf; color: white; }
        .discover { background-color: #ff6000; color: white; }
        .stripe { background-color: #635bff; color: white; }
        .footer-bottom {
            background-color: #000000;
            border-top: none;
            margin-top: 30px;
            padding: 20px 0;
            text-align: center;
            position: relative;
            z-index: 2;
        }
        .footer-bottom p {
            color: #ccc;
            font-size: 12px;
        }
        .footer-bottom .orange {
            color: #ff6b35;
        }
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            /* Hide the purple header part */
            .header-top {
                display: none;
            }
            /* Reduce the size of the logo on mobile */
            .header-main-content .logo img {
                height: 40px; /* Smaller size for mobile */
            }
            /* Ensure logo is left-aligned and menu button is right-aligned */
            .header-main-content {
                display: flex;
                justify-content: space-between; /* Pushes logo to left, menu to right */
                align-items: center;
                padding: 15px 20px;
                /* Remove any conflicting absolute positioning or auto margins */
                position: static;
            }
            .header-main-content .logo {
                margin: 0; /* Remove auto margins */
                position: static;
                transform: none;
                left: auto;
                z-index: auto;
            }
            .mobile-menu-toggle {
                display: block; /* Ensure it's visible */
            }
            /* General mobile adjustments for other sections */
            .header-top-content {
                flex-direction: column;
                gap: 10px;
                text-align: center;
                align-items: center;
            }
            .contact-info {
                align-items: center;
            }
            .social-icons {
                justify-content: center;
            }
            .contact-line {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                gap: 5px 15px;
                text-align: center;
                width: 100%;
            }
            .contact-line span {
                white-space: normal;
            }
            /* Hero section is not in app.blade.php, so no need to adjust */
            /* .hero-content h1 { font-size: 32px; } */
            /* .tracking-form { flex-direction: column; max-width: 300px; } */
            /* .tracking-form input { width: 100%; border-radius: 4px; margin-bottom: 10px; } */
            /* .tracking-form button { border-radius: 4px; } */

            /* Service Icons Overlap Section is not in app.blade.php */
            /* .service-icons { grid-template-columns: repeat(2, 1fr); gap: 20px; } */

            /* Other sections not in app.blade.php */
            /* .who-we-are-content, .extra-features-content { grid-template-columns: 1fr; gap: 40px; } */
            /* .delivery-features { grid-template-columns: 1fr; gap: 30px; } */
            /* .services-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; } */
            /* .news-grid { grid-template-columns: 1fr; gap: 20px; } */

            .newsletter-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .newsletter-form {
                flex-direction: column;
                width: 100%;
            }
            .newsletter-form input {
                width: 100%;
                margin-bottom: 10px;
            }
            .newsletter-form button {
                width: 100%;
            }
            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 0 15px;
            }
            .footer-section {
                text-align: left; /* Keep consistent with home.blade.php */
            }
            .company-info {
                text-align: left; /* Keep consistent with home.blade.php */
            }
            .footer-social {
                justify-content: center;
            }
            .payment-methods {
                justify-content: center;
            }
            .nav-menu {
                display: none; /* Hide the full navigation menu on mobile */
            }
        }
        @media (max-width: 480px) {
            .header-top {
                font-size: 10px;
            }
            .contact-info span {
                font-size: 10px;
            }
            .logo img {
                height: 40px;
            }
            .newsletter-text h3 {
                font-size: 16px;
            }
            .newsletter-text p {
                font-size: 12px;
            }
            .footer-section h3 {
                font-size: 16px;
            }
            .footer-section p,
            .footer-section ul li a {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-top">
            <div class="header-top-content">
                <div class="contact-info">
                    <div class="contact-line">
                        <span><i class="fas fa-phone"></i> +86 155 7101 4859 | +254 722 873000 | +1 (845) 551-9018|   <span><i class="fas fa-envelope"></i> info@Shipexcs.com</span></span>
                      
                    </div>
                    <div class="contact-line">
                        <span><i class="fas fa-map-marker-alt"></i> Yiwu, 32200, China | Kiambu, Kenya | Columbia, MD 21046, United States</span>
                    </div>
                </div>
                <div class="social-icons">
                    <span>Follow us :</span>
                    <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="header-main-content">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="SHIPEX Logo">
                </div>
                <nav>
                    @auth
                        <ul class="nav-menu">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('admin.shipments.create') }}">Create Shipment</a></li>
                            <li><a href="{{ route('admin.shipment-list') }}">Shipment List</a></li>
                            <li><a href="#">Profile</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        </ul>
                    @else
                        <ul class="nav-menu">
                            <li><a href="/" class="active">Home</a></li>
                            <li><a href="/services">Services</a></li>
                            <li><a href="{{ route('track') }}">Tracking</a></li>
                            <li><a href="/about">About</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    @endauth
                </nav>
                <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i> Menu
                </button>
                <div class="mobile-dropdown" id="mobileDropdown">
                    @auth
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        <a href="{{ route('admin.shipments.create') }}">Create Shipment</a>
                        <a href="{{ route('admin.shipment-list') }}">Shipment List</a>
                        <a href="#">Profile</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    @else
                        <a href="/">Home</a>
                        <a href="/services">Services</a>
                        <a href="{{ route('track') }}">Tracking</a>
                        <a href="/about">About</a>
                        <a href="/contact">Contact</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="content">
        @yield('content')
    </main>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="newsletter-content">
            <div class="newsletter-text">
                <h3>Newsletter Sign up</h3>
                <p>Notifications our last deals...</p>
            </div>
            <div class="newsletter-form">
                <input type="email" placeholder="Enter Your Email">
                <button type="submit">Subscribe</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section company-info">
                <div class="logo-footer">
                    <img src="{{ asset('images/logo.png') }}" alt="SHIPEX Logo">
                </div>
                <div class="company-tagline">COURIER SERVICES</div>
                <p>We offers the industry's most skilled and superior technology. We have the smallest to the largest and most complex logistics challenges, whether on a domestic or global level.</p>
                <div class="footer-social">
                    <a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Services</h3>
                <ul>
                    <li><a href="#">Air Freight</a></li>
                    <li><a href="#">Cargo Services</a></li>
                    <li><a href="#">Ocean Freight</a></li>
                    <li><a href="#">Package and Storage</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Site Pages</h3>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="{{ route('track') }}">Tracking</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/services">Services</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Location</h3>
                <div class="location-info">
                    <p>Yiwu, 32200 I, China | Kiambu, Kenya | Columbia, MD 21046, United States</p>
                </div>
                <div class="call-center">
                    <h4>Call Center</h4>
                    <p>+86 155 7101 4859 | +254 722 873000 | +1 (845) 551-9018</p>
                </div>
                <div class="payment-methods">
                    <div class="payment-icon visa">VISA</div>
                    <div class="payment-icon mastercard">MC</div>
                    <div class="payment-icon amex">AMEX</div>
                    <div class="payment-icon discover">DISC</div>
                    <div class="payment-icon stripe">STRIPE</div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright© <span class="orange">Shipexcs Courier Services</span> | All Rights Reserved 2025</p>
        </div>
    </footer>
    <script>
        function toggleMobileMenu() {
            const dropdown = document.getElementById('mobileDropdown');
            dropdown.classList.toggle('show');
        }
        // Close dropdown when clicking outside
        window.onclick = function(event) {
            if (!event.target.matches('.mobile-menu-toggle') && !event.target.matches('.fas')) {
                const dropdown = document.getElementById('mobileDropdown');
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        }
    </script>
</body>
</html>
