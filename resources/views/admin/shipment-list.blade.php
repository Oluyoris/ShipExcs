@extends('layouts.app')

@section('content')
<style>
    /* General Body and Container Styling */
    body {
        background-color: #f0f2f5; /* Light grey background for the whole page */
        font-family: 'Quicksand', sans-serif;
        color: #333;
    }

    .list-container {
        max-width: 1200px;
        margin: 40px auto; /* Add some top/bottom margin */
        padding: 20px;
        background-color: #ffffff; /* White background for the main content area */
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Subtle shadow for depth */
    }

    /* List Header */
    .list-header {
        color: #2b123f; /* Dark purple for the main title */
        font-size: 2.5rem; /* Larger font size */
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
    }

    /* Table Styling */
    .shipment-table-wrapper {
        overflow-x: auto; /* Allows horizontal scrolling on small screens */
        margin-bottom: 30px;
        border: 1px solid #e0e0e0; /* Light border around the table */
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .shipment-table {
        width: 100%;
        border-collapse: separate; /* Use separate to allow border-radius on cells */
        border-spacing: 0; /* Remove default spacing */
        min-width: 900px; /* Increased to accommodate image and action columns */
    }

    .shipment-table thead tr {
        background-color: #2b123f; /* Dark purple for header */
        color: #fff;
    }

    .shipment-table th {
        padding: 15px 20px;
        text-align: left;
        font-weight: 600;
        font-size: 0.95rem;
        white-space: nowrap; /* Prevent header text from wrapping */
    }

    .shipment-table tbody tr {
        background-color: #ffffff;
        transition: background-color 0.2s ease;
    }

    .shipment-table tbody tr:nth-child(even) {
        background-color: #fdfdfd; /* Slightly different background for even rows */
    }

    .shipment-table tbody tr:hover {
        background-color: #f0f2f5; /* Highlight row on hover */
    }

    .shipment-table td {
        padding: 15px 20px;
        border-bottom: 1px solid #eee; /* Light border between rows */
        font-size: 0.9rem;
        vertical-align: top; /* Align content to top in cells */
    }

    .shipment-table tbody tr:last-child td {
        border-bottom: none; /* No border on the last row */
    }

    /* Specific Column Styling */
    .status-cell {
        color: #ff6200; /* SHIPEX orange for status */
        font-weight: 600;
    }

    .status-message {
        font-size: 0.8em;
        color: #666;
        margin-top: 5px;
        line-height: 1.4;
        word-break: break-word; /* Allow long words to break */
    }

    /* Image Styling */
    .image-cell img {
        max-width: 100px; /* Limit image size */
        max-height: 100px;
        border-radius: 5px;
        object-fit: cover;
    }

    .image-cell .no-image {
        color: #777;
        font-style: italic;
    }

    /* Action Links */
    .action-link {
        color: #ff6200; /* SHIPEX orange for edit link */
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s ease;
        margin-right: 15px; /* Space between edit and delete links */
    }

    .action-link.delete-link {
        color: #dc3545; /* Red for delete link */
    }

    .action-link:hover {
        color: #e05500; /* Darker orange on hover for edit */
    }

    .action-link.delete-link:hover {
        color: #c82333; /* Darker red on hover for delete */
        text-decoration: underline;
    }

    /* No Shipments Message */
    .no-shipments {
        text-align: center;
        padding: 30px;
        font-size: 1.1rem;
        color: #777;
    }

    /* Back to Dashboard Button */
    .back-button {
        background-color: #ff6200; /* SHIPEX orange */
        color: #fff;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        margin-top: 30px;
    }

    .back-button:hover {
        background-color: #e05500; /* Darker orange on hover */
        transform: translateY(-2px);
    }

    /* Success Message */
    .success-message {
        background-color: #d4edda; /* Light green background */
        color: #155724; /* Dark green text */
        padding: 15px;
        border-radius: 5px;
        margin-top: 25px;
        text-align: center;
        font-weight: 500;
        border: 1px solid #c3e6cb;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .list-container {
            margin: 20px auto;
            padding: 15px;
        }

        .list-header {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .shipment-table th,
        .shipment-table td {
            padding: 12px 15px;
            font-size: 0.85rem;
        }

        .status-message {
            font-size: 0.75em;
        }

        .image-cell img {
            max-width: 80px;
            max-height: 80px;
        }

        .action-link {
            display: block; /* Stack links on mobile */
            margin-bottom: 10px;
        }

        .back-button {
            width: 100%;
            text-align: center;
        }
    }

    @media (max-width: 480px) {
        .list-header {
            font-size: 1.8rem;
        }

        .image-cell img {
            max-width: 60px;
            max-height: 60px;
        }
    }
</style>

<div class="list-container">
    <h1 class="list-header">Shipment List</h1>

    <div class="shipment-table-wrapper">
        <table class="shipment-table">
            <thead>
                <tr>
                    <th>Tracking ID</th>
                    <th>Package</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($shipments as $shipment)
                    <tr>
                        <td>{{ $shipment->tracking_id }}</td>
                        <td>{{ $shipment->package_name }}</td>
                        <td class="image-cell">
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
                        <td class="status-cell">
                            {{ $shipment->status }}
                            @if($shipment->status_message)
                                <div class="status-message">Reason: {{ $shipment->status_message }}</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.shipment.edit', $shipment->id) }}" class="action-link">Edit</a>
                            <form action="{{ route('admin.shipment.destroy', $shipment->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this shipment? This action cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-link delete-link" style="background:none; border:none; padding:0; cursor:pointer; text-decoration:none;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="no-shipments">No shipments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="back-button">Back to Dashboard</a>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif
</div>
@endsection