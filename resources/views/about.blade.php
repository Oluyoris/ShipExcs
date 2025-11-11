<!DOCTYPE html>
<html>
<head>
    <title>About Us - ShipExcs Courier Service</title>
    <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&family=Georgia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            background-color: rgb(43, 18, 63);
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
            color: rgb(223, 60, 1);
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
            height: 40px;
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
            color: rgb(221, 59, 0);
        }
        /* Mobile dropdown */
        .mobile-menu-toggle {
            display: none;
            background-color: rgb(45, 16, 83);
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
            background-color: rgb(235, 63, 0);
            color: white;
        }
        .mobile-dropdown.show {
            display: block;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #dc3545 0%, #1e3c72 100%);
            background-image: url('{{ asset('images/a.jpg') }}');
            background-size: cover;
            background-position: center;
            background-blend-mode: overlay;
            padding: 100px 0;
            text-align: center;
            color: white;
            position: relative;
        }

        .breadcrumb {
            font-size: 14px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .breadcrumb a {
            color: white;
            text-decoration: none;
        }

        .breadcrumb span {
            margin: 0 10px;
        }

        .hero-content h1 {
            font-size: 64px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            letter-spacing: 2px;
        }

        /* About Us Section */
        .about-us-section {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .about-us-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 60px;
        }

        .about-us-image img {
            width: 100%;
            max-width: 500px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .about-us-text h2 {
            font-size: 42px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .about-us-text .subtitle {
            color: #ff6b35;
            font-size: 18px;
            margin-bottom: 25px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .about-us-text p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .about-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .stat-item {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
        }

        .stat-number {
            font-size: 36px;
            font-weight: bold;
            color: #ff6b35;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Customer Reviews Section */
        .reviews-section {
            background: linear-gradient(rgba(30, 60, 114, 0.9), rgba(30, 60, 114, 0.9)), url('{{ asset('images/dd.jpg') }}');
            background-size: cover;
            background-position: center;
            padding: 80px 0;
            color: white;
            text-align: center;
        }

        .reviews-content {
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .reviews-section h2 {
            font-size: 36px;
            margin-bottom: 10px;
        }

        .reviews-section .subtitle {
            color: #ff6b35;
            font-size: 16px;
            margin-bottom: 40px;
            font-weight: bold;
        }

        .review-slider {
            position: relative;
        }

        .review-item {
            display: none;
            padding: 40px;
        }

        .review-item.active {
            display: block;
        }

        .review-item h3 {
            color: #ff6b35;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .stars {
            color: #ffd700;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .review-text {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
            font-style: italic;
        }

        .reviewer {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }

        .reviewer img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }

        .reviewer-info h4 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .reviewer-info p {
            font-size: 14px;
            opacity: 0.8;
        }

        .slider-dots {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 30px;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.3);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #ff6b35;
        }

        /* Our Services Section */
        .our-services {
            padding: 80px 0;
            background-color: #f8f9fa;
            text-align: center;
        }

        .our-services h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 10px;
        }

        .our-services .subtitle {
            color: #ff6b35;
            font-size: 16px;
            margin-bottom: 60px;
            font-weight: bold;
        }

        .services-grid {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .service-item {
            background-color: white;
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .service-item:hover {
            transform: translateY(-5px);
        }

        .service-item i {
            font-size: 50px;
            color: #ff6b35;
            margin-bottom: 20px;
        }

        .service-item h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .service-item p {
            color: #666;
            line-height: 1.6;
            font-size: 14px;
        }

        /* Newsletter Section */
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
            color: #ff6b35;
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
            background-color: #ff6b35;
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
            color: rgb(216, 58, 0);
        }
        .company-info .logo-footer img {
            height: 50px;
            margin-bottom: 15px;
        }
        .company-tagline {
            color: rgb(212, 57, 0);
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
            color: rgb(223, 59, 0);
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
            .hero-content h1 {
                font-size: 32px;
            }
            .about-us-content {
                grid-template-columns: 1fr;
                gap: 40px;
                padding: 40px 20px;
            }
            .about-stats {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .services-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
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
                text-align: left;
            }
            .company-info {
                text-align: left;
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
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-top">
            <div class="header-top-content">
                <div class="contact-info">
                    <div class="contact-line">
                        <span><i class="fas fa-phone"></i> +86 155 7101 4859 | +254 722 873000 | +1 (845) 551-9018  | <span><i class="fas fa-envelope"></i> info@Shipexcs.com</span></span>
                       
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
                    <ul class="nav-menu">
                        <li><a href="/" class="active">Home</a></li>
                        <li><a href="/services">Services</a></li>
                        <li><a href="{{ route('track') }}">Tracking</a></li>
                        <li><a href="/about">About</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </nav>
                <button class="mobile-menu-toggle" onclick="toggleMobileMenu()">
                    <i class="fas fa-bars"></i> Menu
                </button>
                <div class="mobile-dropdown" id="mobileDropdown">
                    <a href="/">Home</a>
                    <a href="/services">Services</a>
                   <a href="{{ route('track') }}">Tracking</a>
                    <a href="/about">About</a>
                    <a href="/contact">Contact</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="breadcrumb">
            <a href="/">HOME</a> <span>></span> ABOUT US
        </div>
        <div class="hero-content">
            <h1>ABOUT US</h1>
        </div>
    </section>

    <!-- About Us Section -->
    <section class="about-us-section">
        <div class="about-us-content">
            <div class="about-us-image">
                <img src="{{ asset('images/abt.jpg') }}" alt="SHIPEX Operations">
            </div>
            <div class="about-us-text">
                <h2>20 Years of Service</h2>
                <div class="subtitle">Trust Work & Excellence</div>
                <p>For over two decades, SHIPEX Courier Services has been at the forefront of global logistics and transportation solutions. Our journey began with a simple mission: to provide reliable, efficient, and cost-effective shipping services that businesses and individuals can trust.</p>
                
                <p>Throughout our 20-year history, we have built an extensive network spanning across continents, connecting businesses in China, Kenya, and the United States. Our commitment to excellence has earned us the trust of thousands of clients who rely on our expertise for their most critical shipments.</p>
                
                <p>We pride ourselves on our innovative approach to logistics, combining cutting-edge technology with personalized service. Our experienced team understands that every shipment is important, whether it's a small package or a large cargo container.</p>
                
                <p>Today, SHIPEX stands as a testament to what dedication, hard work, and customer focus can achieve. We continue to evolve and adapt to meet the changing needs of global commerce while maintaining the core values that have made us a trusted partner in international shipping.</p>
                
                <div class="about-stats">
                    <div class="stat-item">
                        <div class="stat-number">20+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">50K+</div>
                        <div class="stat-label">Happy Clients</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100K+</div>
                        <div class="stat-label">Shipments Delivered</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">99.9%</div>
                        <div class="stat-label">Success Rate</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section class="reviews-section">
        <div class="reviews-content">
            <h2>Our Top Reviews</h2>
            <div class="subtitle">Global Customer Service</div>
            
            <div class="review-slider">
                <div class="review-item active">
                    <h3>Shipping Cargo</h3>
                    <div class="stars">★★★★★</div>
                    <p class="review-text">"I used this cargo delivery service to ship goods internationally, and I was extremely impressed. The process was seamless, the staff was friendly, and my items arrived on time without damage. Highly recommend!"</p>
                    <div class="reviewer">
                        <img src="{{ asset('images/cc.jpg') }}" alt="Tony Alexander">
                        <div class="reviewer-info">
                            <h4>Tony Alexander</h4>
                            <p>Business Owner</p>
                        </div>
                    </div>
                </div>
                
                <div class="review-item">
                    <h3>Express Delivery</h3>
                    <div class="stars">★★★★★</div>
                    <p class="review-text">"Outstanding service! SHIPEX handled our urgent shipment with professionalism and care. The tracking system kept us informed every step of the way. Will definitely use their services again."</p>
                    <div class="reviewer">
                        <img src="{{ asset('images/e.jpg') }}" alt="Sarah Johnson">
                        <div class="reviewer-info">
                            <h4>Sarah Johnson</h4>
                            <p>Import Manager</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="slider-dots">
                <span class="dot active" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
            </div>
        </div>
    </section>

    <!-- Our Services Section -->
    <section class="our-services">
        <h2>Our Service</h2>
        <div class="subtitle">Online Logistics</div>
        
        <div class="services-grid">
            <div class="service-item">
                <i class="fas fa-ship"></i>
                <h3>Ocean Freight</h3>
                <p>When it comes to transporting goods across oceans, our ocean freight services provide cost-effective solutions for businesses of all sizes.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-plane"></i>
                <h3>Air Freight</h3>
                <p>Global air freight with the most experienced and professional team. We understand the importance of meeting deadlines and ensuring your goods reach their destination.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-thumbs-up"></i>
                <h3>Quality Assurance</h3>
                <p>Our quality assurance program ensures that every shipment meets our high standards for safety, security, and timely delivery.</p>
            </div>
            <div class="service-item">
                <i class="fas fa-warehouse"></i>
                <h3>Packaging & Storage</h3>
                <p>Professional packaging and secure storage solutions to protect your goods throughout the supply chain with climate-controlled facilities.</p>
            </div>
        </div>
    </section>

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
                    <li><a href="/tracking">Tracking</a></li> <!-- Temporary fallback -->
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
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright© <span class="orange">Shipexca Courier Services</span> | All Rights Reserved 2025</p>
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
        // Review slider functionality
        let slideIndex = 1;
        function currentSlide(n) {
            showSlide(slideIndex = n);
        }
        function showSlide(n) {
            let slides = document.getElementsByClassName('review-item');
            let dots = document.getElementsByClassName('dot');

            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }

            for (let i = 0; i < slides.length; i++) {
                slides[i].classList.remove('active');
            }

            for (let i = 0; i < dots.length; i++) {
                dots[i].classList.remove('active');
            }

            slides[slideIndex - 1].classList.add('active');
            dots[slideIndex - 1].classList.add('active');
        }
        // Auto-slide reviews every 5 seconds
        setInterval(function() {
            slideIndex++;
            if (slideIndex > 2) slideIndex = 1;
            showSlide(slideIndex);
        }, 5000);
    </script>
</body>
</html>