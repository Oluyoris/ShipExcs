@extends('layouts.app')

@section('content')
<style>
    /* General Body and Container Styling */
    body {
        background-color: #f0f2f5; /* Light grey background for the whole page */
        font-family: 'Quicksand', sans-serif;
        color: #333;
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 40px auto; /* Add some top/bottom margin */
        padding: 20px;
        background-color: #ffffff; /* White background for the main content area */
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Subtle shadow for depth */
    }

    /* Dashboard Header */
    .dashboard-header {
        color: #2b123f; /* Dark purple for the main title */
        font-size: 2.5rem; /* Larger font size */
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
    }

    /* Stats Cards Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive grid */
        gap: 25px; /* Increased gap between cards */
        margin-bottom: 40px;
    }

    .stat-card {
        background-color: #f8f9fa; /* Very light grey for cards */
        padding: 25px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); /* Lighter shadow for cards */
        text-align: center;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }

    .stat-card:hover {
        transform: translateY(-5px); /* Slight lift on hover */
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    }

    .stat-card h2 {
        font-size: 1.2rem;
        color: #555;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .stat-card p {
        font-size: 3rem; /* Very large number */
        font-weight: 700;
        color: #ff6200; /* SHIPEX orange for the numbers */
        line-height: 1; /* Adjust line height for large numbers */
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        flex-wrap: wrap; /* Allow buttons to wrap on smaller screens */
        gap: 15px; /* Space between buttons */
        justify-content: center; /* Center buttons */
        margin-top: 30px;
    }

    .action-button {
        background-color: #ff6200; /* SHIPEX orange */
        color: #fff;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        display: inline-flex; /* Use inline-flex for better alignment with icon if added */
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .action-button:hover {
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
        .dashboard-container {
            margin: 20px auto;
            padding: 15px;
        }

        .dashboard-header {
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .stat-card {
            padding: 20px;
        }

        .stat-card p {
            font-size: 2.5rem;
        }

        .action-buttons {
            flex-direction: column; /* Stack buttons vertically on small screens */
            align-items: stretch; /* Make buttons full width */
        }

        .action-button {
            width: 100%; /* Full width buttons */
        }
    }

    @media (max-width: 480px) {
        .dashboard-header {
            font-size: 1.8rem;
        }
        .stat-card p {
            font-size: 2rem;
        }
    }
</style>

<div class="dashboard-container">
    <h1 class="dashboard-header">Admin Dashboard</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <h2>Total Shipments</h2>
            <p>{{ $totalShipments }}</p>
        </div>
        <div class="stat-card">
            <h2>Pending Shipments</h2>
            <p>{{ $pendingShipments }}</p>
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('admin.shipment-list') }}" class="action-button">View Shipment List</a>
        <a href="{{ route('admin.shipments.create') }}" class="action-button">Create New Shipment</a>
        <a href="{{ route('admin.messages') }}" class="action-button">View Messages</a>
    </div>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif
</div>
@endsection