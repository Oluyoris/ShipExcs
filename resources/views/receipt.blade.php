<!DOCTYPE html>
<html>
<head>
    <title>SHIPEX Receipt</title>
    <style type="text/css">
        body {
             font-family: 'Helvetica', Arial, sans-serif;
             margin: 0;
             padding: 20px;
             background-color: #f5f5f5;
        }

        .receipt {
             width: 600px;
             margin: 0 auto;
             border: 2px solid #000;
             padding: 30px;
             box-sizing: border-box;
             background-color: white;
            position: relative;
        }

        .header {
             display: flex;
             justify-content: space-between;
             margin-bottom: 30px;
             align-items: flex-start;
        }

        .logo-section {
             text-align: left;
         }

        /* Styles for the main header SHIPEX text logo and tagline */
        .logo-main-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start; /* Align content to the left */
        }

        .logo-text {
            font-size: 36px; /* Base size for both SHIP and EX */
            font-weight: bold;
            line-height: 1; /* Ensure no extra line height */
            display: inline-flex; /* Keep SHIP and EX on same line */
            align-items: baseline; /* Align to same baseline instead of flex-end */
            letter-spacing: -1px;
        }
        .logo-text .ship {
            color: #2b123f; /* Deep purple */
            font-size: 36px; /* Same size as base */
        }
        .logo-text .ex {
            color: #ff6200; /* Deep orange */
            font-size: 36px; /* Same size as SHIP - removed the larger size */
            position: relative;
            top: 0; /* Remove the lift - keep on same baseline */
        }

        /* Styles for the "COURIER SERVICES" tagline below the main logo */
        .company-tagline {
            font-size: 12px;
            color: #666;
            margin-top: 5px; /* Small gap from logo */
            display: block; /* Ensure it's on its own line */
            line-height: 1.2; /* Adjust line height for closeness */
        }

        .company-info p {
             margin: 2px 0;
             font-size: 12px;
            color: #666;
        }

        .invoice-info {
             text-align: right;
             border: 1px solid #000;
            padding: 15px;
            min-width: 150px;
        }

        .invoice-info h3 {
             margin: 0 0 10px 0;
             font-size: 16px;
            text-align: center;
            background-color: #f0f0f0;
            padding: 5px;
            margin: -15px -15px 10px -15px;
        }

        .invoice-info p {
             margin: 5px 0;
             font-size: 12px;
        }

        .invoice-to {
             margin: 20px 0;
             border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }

        .invoice-to h3 {
             margin-bottom: 10px;
             font-size: 14px;
        }

        .invoice-to p {
             margin: 3px 0;
             font-size: 12px;
        }

        .item-table {
             width: 100%;
             border-collapse: collapse;
             margin: 20px 0;
         }

        .item-table th {
             border: 1px solid #000;
             padding: 10px 8px;
             text-align: center;
             background-color: #f0f0f0;
            font-size: 12px;
            font-weight: bold;
        }

        .item-table td {
             border: 1px solid #000;
             padding: 10px 8px;
             text-align: center;
             font-size: 12px;
            vertical-align: middle;
        }

        .item-table td:first-child {
            width: 80px;
        }

        .item-table td:nth-child(2) {
            text-align: left;
            width: 200px;
        }

        .package-image {
            max-width: 60px;
            max-height: 60px;
            object-fit: cover;
        }

        .bottom-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 30px;
        }

        .charges-box {
             border: 1px solid #000;
             padding: 15px;
             min-width: 150px;
            text-align: right;
        }

        .charges-box p {
             margin: 8px 0;
             font-size: 12px;
        }

        .charges-box .total {
            border-top: 1px solid #000;
            padding-top: 8px;
            margin-top: 8px;
            font-weight: bold;
        }

        .barcode-section {
            text-align: center;
        }

        .barcode-section img {
            max-width: 150px;
            margin-bottom: 5px;
        }

        .barcode-section p {
            font-size: 10px;
            margin: 0;
        }

        .go-back-button {
            background-color: #ff6200;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-top: 20px;
        }
        .go-back-button:hover {
            background-color: #e05500;
        }

        /* Watermark styles */
        .watermark {
             position: absolute;
             top: 50%;
             left: 50%;
             transform: translate(-50%, -50%) rotate(-45deg);
             opacity: 0.05;
             z-index: 0;
            pointer-events: none;
            filter: blur(2px);
            display: flex; /* Use flexbox for watermark content */
            flex-direction: column;
            align-items: center; /* Center content horizontally */
            justify-content: center; /* Center content vertically */
        }
        /* Specific styles for watermark logo text to ensure side-by-side */
        .watermark .logo-text {
            font-size: 90px; /* Base size for watermark */
            line-height: 1; /* Ensure no extra line height */
            display: inline-flex; /* Explicitly set to inline-flex for side-by-side */
            align-items: baseline; /* Align to same baseline */
            letter-spacing: -2px;
        }
        .watermark .ship {
            color: #2b123f; /* Deep purple */
            font-size: 90px; /* Same size as base */
        }
        .watermark .ex {
            color: #ff6200; /* Deep orange */
            font-size: 90px; /* Same size as SHIP - no longer larger */
            position: relative;
            top: 0; /* Remove the lift - keep on same baseline */
        }
        /* Styles for the "COURIER SERVICES" tagline below the watermark logo */
        .watermark-tagline {
            font-size: 24px; /* Tagline for watermark */
            color: #666; /* Use a slightly darker color for better visibility with blur */
            display: block;
            margin-top: 10px; /* Small gap from watermark logo */
            line-height: 1.2; /* Adjust line height for closeness */
        }

        .content {
            position: relative;
            z-index: 1;
        }

        @media print {
            body {
                 margin: 0;
                 padding: 0;
                 background-color: white;
            }
            .receipt {
                 border: 1px solid #000;
                 width: 100%;
                 max-width: none;
            }
            .go-back-button {
                 display: none;
             }
            .watermark {
                 opacity: 0.03;
                 filter: blur(1px);
            }
            .watermark .logo-text {
                font-size: 70px;
            }
            .watermark .ship {
                font-size: 70px; /* Same size for print */
            }
            .watermark .ex {
                font-size: 70px; /* Same size for print */
                top: 0; /* Keep aligned for print */
            }
            .watermark-tagline {
                font-size: 18px;
            }
        }
    </style>
</head>
<body>
    <div class="receipt">
        <div class="watermark">
            <span class="logo-text">
                <span class="ship">SHIP</span><span class="ex">EX</span>
            </span>
            <span class="watermark-tagline">COURIER SERVICES</span>
        </div>

        <div class="content">
            <div class="header">
                <div class="logo-section">
                    <div class="logo-main-wrapper">
                        <span class="logo-text">
                            <span class="ship">SHIP</span><span class="ex">EX</span>
                        </span>
                        <span class="company-tagline">COURIER SERVICES</span>
                    </div>
                    <div class="company-info">
                        <p>Yiwu, 32200, China | Kiambu, Kenya | Columbia, MD 21046, United States</p>
                        <p>Phone: +86 155 7101 4859 | +254 722 873000 | +1 (845) 551-9018</p>
                        <p>Email: info@Shipexcs.com</p>
                    </div>
                </div>
                <div class="invoice-info">
                    <h3>INVOICE</h3>
                    <p><strong>Invoice #:</strong> 82679</p>
                    <p><strong>Date:</strong> {{ \Carbon\Carbon::now()->format('M d, Y') }}</p>
                    <p><strong>Total Charge:</strong> $</p>
                </div>
            </div>

            <div class="invoice-to">
                <h3>Invoiced to:</h3>
                <p><strong>{{ $shipment->receiver_name }}</strong></p>
                <p>Address:</p>
                <p>5125698113</p>
                <p>ENCRYPTED</p>
                <p>{{ $shipment->receiver_address }}</p>
                <p><strong>Email:</strong> {{ !empty($shipment->receiver_email) ? 'ENCRYPTED' : 'N/A' }}</p>
            </div>

            <table class="item-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Total Charge</th>
                        <th>Quantity</th>
                        <th>Charges</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            @php
                                $imagePath = $shipment->image_path ? storage_path('app/public/' . $shipment->image_path) : null;
                                $imageBase64 = ($imagePath && file_exists($imagePath)) ? 'data:image/png;base64,' . base64_encode(file_get_contents($imagePath)) : null;
                            @endphp
                            @if($imageBase64)
                                <img src="{{ $imageBase64 }}" alt="Package Image" class="package-image">
                            @else
                                <div style="width: 60px; height: 60px; background-color: #f0f0f0; display: flex; align-items: center; justify-content: center; font-size: 10px;">No Image</div>
                            @endif
                        </td>
                        <td>{{ strtoupper($shipment->package_name) }}</td>
                        <td>$</td>
                        <td>1</td>
                        <td>$</td>
                    </tr>
                </tbody>
            </table>

            <div class="bottom-section">
                <a href="{{ route('track') }}" class="go-back-button">Go Back</a>

                <div style="display: flex; flex-direction: column; align-items: flex-end; gap: 20px;">
                    <div class="charges-box">
                        <p>Charge: $</p>
                        <p class="total">Total Charge: $</p>
                    </div>

                    <div class="barcode-section">
                        <img src="https://barcode.tec-it.com/barcode.ashx?data={{ urlencode($shipment->tracking_id) }}&code=Code128&width=150&height=50" alt="Barcode">
                        <p><strong>Tracking ID:</strong> {{ $shipment->tracking_id ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
