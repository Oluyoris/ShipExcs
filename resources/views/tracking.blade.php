<!DOCTYPE html>
<html>
<head>
    <title>Track Your Shipment - ShipExcs Courier Service</title>
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
        /* Hero Section with Background Image */
        .hero-section {
            background-image: linear-gradient(rgba(74, 26, 74, 0.7), rgba(255, 107, 53, 0.7)), url('{{ asset('images/dd.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 80px 0;
            text-align: center;
            color: white;
        }
        .hero-content h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .hero-content p {
            font-size: 18px;
            margin-bottom: 40px;
            opacity: 0.9;
        }
        .tracking-form {
            max-width: 500px;
            margin: 0 auto;
            display: flex;
            gap: 0;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .tracking-form input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            font-size: 16px;
            outline: none;
        }
        .tracking-form button {
            padding: 15px 30px;
            background-color: rgb(241, 73, 11);
            color: white;
            border: none;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .tracking-form button:hover {
            background-color: rgb(226, 61, 6);
        }
        /* Main Content */
        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: white;
        }
        /* Status Timeline - Centralized with Border */
        .status-timeline {
            margin-bottom: 40px;
            border: 2px solid rgb(219, 62, 5);
            border-radius: 10px;
            padding: 30px;
            background-color: #fff;
            text-align: center;
        }
        .status-timeline h2 {
            color: rgb(218, 59, 2);
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
        }
        .timeline-item {
            display: flex;
            margin-bottom: 30px;
            position: relative;
            justify-content: flex-start;
            text-align: left;
        }
        .timeline-dot {
            width: 20px;
            height: 20px;
            background-color: rgb(214, 69, 16);
            border-radius: 50%;
            margin-right: 20px;
            margin-top: 5px;
            position: relative;
            z-index: 2;
            flex-shrink: 0;
        }
        .timeline-item:not(:last-child) .timeline-dot::after {
            content: '';
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 40px;
            background-color: rgb(221, 62, 5);
        }
        .timeline-content {
            flex: 1;
            min-width: 0;
        }
        .timeline-content h4 {
            color: black;
            font-weight: bold;
            margin-bottom: 5px;
            display: flex;
            align-items: center;
        }
        .timeline-content p {
            color: rgb(226, 63, 4);
            font-size: 14px;
            line-height: 1.5;
            word-wrap: break-word;
            max-width: 100%;
        }
        .timeline-number {
            width: 30px;
            text-align: right;
            margin-right: 10px;
            color: rgb(223, 62, 4);
            font-weight: bold;
        }
        .timeline-date {
            color: #666;
            font-size: 12px;
            margin-top: 5px;
        }
        /* Shipment Details */
        .shipment-details {
            background-color: #f9f9f9;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .barcode-section {
            text-align: center;
            margin-bottom: 30px;
        }
        .barcode-section h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .barcode-section img {
            margin-bottom: 15px;
            max-width: 200px;
            height: auto;
        }
        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }
        .info-section h3 {
            color: #333;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .info-section p {
            margin-bottom: 8px;
            color: #666;
        }
        .status-banner {
            background-color: rgb(231, 62, 0);
            color: white;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            margin: 30px 0;
            border-radius: 4px;
        }
        .package-image {
            text-align: center;
            margin: 30px 0;
        }
        .package-image img {
            max-width: 400px;
            max-height: 300px;
            width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            border: 4px solid #ff6200;
            object-fit: cover;
        }
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 30px 0;
        }
        .detail-item {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .detail-item h4 {
            color: rgb(238, 63, 0);
            font-weight: bold;
            margin-bottom: 15px;
        }
        .detail-item p {
            margin-bottom: 8px;
            color: #666;
        }
        .map-section {
            text-align: center;
            margin: 40px 0;
        }
        .map-section img {
            width: 100%;
            max-width: 600px;
            height: 300px;
            border: 0;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            object-fit: cover;
        }
        .print-receipt {
            text-align: center;
            margin: 30px 0;
        }
        .print-receipt a {
            display: inline-block;
            background-color: rgb(236, 63, 0);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .print-receipt a:hover {
            background-color: rgb(223, 56, 0);
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
            color: rgb(224, 63, 4);
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
            background-color: rgb(223, 59, 0);
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
            .header-top {
                display: none;
            }
            .header-main-content .logo img {
                height: 40px;
            }
            .header-main-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 15px 20px;
                position: static;
            }
            .header-main-content .logo {
                margin: 0;
                position: static;
                transform: none;
                left: auto;
                z-index: auto;
            }
            .mobile-menu-toggle {
                display: block;
            }
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
            .tracking-form {
                flex-direction: column;
                max-width: 300px;
            }
            .info-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .details-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }
            .package-image img {
                max-width: 300px;
                max-height: 225px;
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
            .status-timeline {
                padding: 20px;
            }
            .timeline-item {
                justify-content: flex-start;
            }
            .nav-menu {
                display: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-top">
            <div class="header-top-content">
                <div class="contact-info">
                    <div class="contact-line">
                        <span><i class="fas fa-phone"></i> +86 155 7101 4859 | +254 722 873000 | +1 (845) 551-9018 | <span><i class="fas fa-envelope"></i> info@Shipexcs.com</span></span>
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
                        <li><a href="{{ route('track') }}" class="active">Tracking</a></li>
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
    <section class="hero-section">
        <div class="hero-content">
            <h1>TRACK & TRACE</h1>
            <p>Enter tracking ID below</p>
            <form action="{{ route('track') }}" method="GET" class="tracking-form">
                <input type="text" name="tracking_id" placeholder="Enter Tracking ID" required value="{{ request('tracking_id') }}">
                <button type="submit">Track Now</button>
            </form>
        </div>
    </section>
    <main class="main-content">
        @if($shipment)
            <div class="status-timeline">
                <h2>Tracking Status Updates</h2>
                @php
                    $history = $shipment->status_history ? json_decode($shipment->status_history, true) : [];
                    $fullHistory = [];
                    // Always add Received as the first status
                    $fullHistory[] = [
                        'status' => 'Received',
                        'message' => 'Package received at the SHIPEX facility office',
                        'updated_at' => $shipment->created_at ? $shipment->created_at : now()->format('Y-m-d H:i:s')
                    ];
                    // Add Departed as the second status if departure_date exists, using sender_address
                    if ($shipment->departure_date) {
                        $fullHistory[] = [
                            'status' => 'Departed',
                            'message' => 'Departed from ' . $shipment->origin,
                            'updated_at' => $shipment->departure_date . ' 00:00:00'
                        ];
                    }
                    // Merge with existing history, avoiding duplicates
                    foreach ($history as $entry) {
                        $statusKey = strtolower($entry['status']);
                        $exists = false;
                        foreach ($fullHistory as $existing) {
                            if (strtolower($existing['status']) === $statusKey) {
                                $exists = true;
                                break;
                            }
                        }
                        if (!$exists) {
                            $fullHistory[] = $entry;
                        }
                    }
                    $fullHistory = array_reverse($fullHistory); // Reverse to start from latest
                    $totalItems = count($fullHistory);
                @endphp
                @for ($i = 0; $i < $totalItems; $i++)
                    @php
                        $entry = $fullHistory[$i];
                        $number = $totalItems - $i; // Number from bottom up, starting with 1 for Received
                    @endphp
                    <div class="timeline-item">
                        <div class="timeline-dot"></div>
                        <div class="timeline-content">
                            <h4>
                                <span class="timeline-number">{{ $number }}.</span>
                                <span>Status: {{ strtoupper($entry['status']) }}</span>
                            </h4>
                            <p>{{ $entry['message'] }}</p>
                            <div class="timeline-date">
                                Updated: {{ \Carbon\Carbon::parse($entry['updated_at'])->format('M d, Y') }}
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            <div class="shipment-details">
                <div class="barcode-section">
                    <h2>SHIPEX</h2>
                    <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $shipment->tracking_id }}&code=Code128&width=200&height=50" alt="Barcode">
                </div>
                <div class="info-grid">
                    <div class="info-section">
                        <h3>Shipper Information</h3>
                        <p><strong>Name:</strong> {{ $shipment->sender_name }}</p>
                        <p><strong>Address:</strong> {{ $shipment->sender_address }}</p>
                        <p><strong>Phone:</strong> {{ $shipment->sender_phone }}</p>
                        <p><strong>Email:</strong> {{ $shipment->sender_email }}</p>
                    </div>
                    <div class="info-section">
                        <h3>Receiver Information</h3>
                        <p><strong>Name:</strong> {{ $shipment->receiver_name }}</p>
                        <p><strong>Address:</strong> {{ $shipment->receiver_address }}</p>
                        <p><strong>Phone:</strong> {{ $shipment->receiver_phone }}</p>
                        <p><strong>Email:</strong> {{ $shipment->receiver_email }}</p>
                    </div>
                </div>
                <div class="status-banner">
                    SHIPMENT STATUS: {{ strtoupper($shipment->status) }}
                </div>
                @php
                    $imagePath = $shipment->image_path ? storage_path('app/public/' . $shipment->image_path) : null;
                    $imageBase64 = ($imagePath && file_exists($imagePath)) ? 'data:image/png;base64,' . base64_encode(file_get_contents($imagePath)) : null;
                @endphp
                @if($imageBase64)
                    <div class="package-image">
                        <img src="{{ $imageBase64 }}" alt="Package Image">
                    </div>
                @else
                    <div class="package-image" style="width: 60px; height: 60px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 10px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        No Image
                    </div>
                @endif
                <div class="details-grid">
                    <div class="detail-item">
                        <h4>Origin</h4>
                        <p><strong>Origin:</strong> {{ $shipment->origin }}</p>
                        <p><strong>Carrier:</strong> {{ $shipment->carrier }}</p>
                        <p><strong>Carrier Reference No:</strong> {{ $shipment->carrier_reference_no }}</p>
                        <p><strong>Expected Delivery Date:</strong> {{ $shipment->expected_delivery_date }}</p>
                    </div>
                    <div class="detail-item">
                        <h4>Package</h4>
                        <p><strong>Package:</strong> {{ $shipment->package_name }}</p>
                        <p><strong>Total Freight:</strong> 1</p>
                        <p><strong>Weight:</strong> {{ $shipment->weight }}</p>
                        <p><strong>Departure Date:</strong> {{ $shipment->departure_date }}</p>
                    </div>
                    <div class="detail-item">
                        <h4>Destination</h4>
                        <p><strong>Destination:</strong> {{ $shipment->destination }}</p>
                        <p><strong>Shipment Mode:</strong> {{ $shipment->shipment_mode }}</p>
                        <p><strong>Payment Mode:</strong> {{ $shipment->payment_mode }}</p>
                        <p><strong>Delivery Time:</strong> {{ $shipment->delivery_time }}</p>
                    </div>
                </div>
               <div class="container">
                            <div class="google-maps-container">
                                <iframe class="map" src="https://maps.google.com/maps?q=CONVERSE, TX&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed" style="border:0; width: 100%; height: 527px;"></iframe>
                            </div>
                        </div>
                <div class="print-receipt">
                    <a href="{{ route('view.receipt', $shipment->tracking_id) }}" target="_blank">View Receipt</a>
                </div>
            </div>
        @else
            @if(request('tracking_id'))
                <div style="text-align: center; padding: 40px; color: #666;">
                    <h2>No shipment found with tracking ID: {{ request('tracking_id') }}</h2>
                    <p>Please check your tracking ID and try again.</p>
                </div>
            @endif
        @endif
    </main>
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
                    <li><a href="/tracking">Tracking</a></li>
                    <li><a href="/about">About</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/services">Services</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h2>Location</h2>
                <div class="location-info">
                    <p>Yiwu, 32200, China | Kiambu, Kenya | Columbia, MD 21046, United States</p>
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
            <p>Copyright© <span class="orange">Shipexcs Courier Services</span> | All Rights Reserved 2025</p>
        </div>
    </footer>
    <script>
        function toggleMobileMenu() {
            const dropdown = document.getElementById('mobileDropdown');
            dropdown.classList.toggle('show');
        }
        window.onclick = function(event) {
            if (!event.target.matches('.mobile-menu-toggle') && !event.target.matches('.fas')) {
                const dropdown = document.getElementById('mobileDropdown');
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        }
    </script>