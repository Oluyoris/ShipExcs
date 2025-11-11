@extends('layouts.app')

@section('content')
<style>
    /* General Body and Container Styling */
    body {
        background-color: #f0f2f5;
        font-family: 'Quicksand', sans-serif;
        color: #333;
    }

    .messages-container {
        max-width: 1200px;
        margin: 40px auto;
        padding: 20px;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .messages-header {
        color: #2b123f;
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 30px;
        text-align: center;
    }

    .messages-table-wrapper {
        overflow-x: auto;
        margin-bottom: 30px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.03);
    }

    .messages-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        min-width: 800px;
    }

    .messages-table th, .messages-table td {
        padding: 15px 20px;
        text-align: left;
        font-size: 0.9rem;
        vertical-align: top;
    }

    .messages-table th {
        background-color: #2b123f;
        color: #fff;
        font-weight: 600;
        white-space: nowrap;
    }

    .messages-table td {
        border-bottom: 1px solid #eee;
    }

    .messages-table tr:last-child td {
        border-bottom: none;
    }

    .back-button {
        background-color: #ff6200;
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
        background-color: #e05500;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .messages-container { margin: 20px auto; padding: 15px; }
        .messages-header { font-size: 2rem; margin-bottom: 20px; }
        .messages-table th, .messages-table td { padding: 12px 15px; font-size: 0.85rem; }
    }

    @media (max-width: 480px) {
        .messages-header { font-size: 1.8rem; }
    }
</style>

<div class="messages-container">
    <h1 class="messages-header">Messages</h1>

    <div class="messages-table-wrapper">
        <table class="messages-table">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $index => $message)
                    @php
                        $lines = explode("\n", trim($message));
                        $data = [];
                        foreach ($lines as $line) {
                            if (strpos($line, ':') !== false) {
                                [$key, $value] = explode(': ', $line, 2);
                                $data[$key] = $value;
                            }
                        }
                    @endphp
                    <tr>
                        <td>{{ $data['First Name'] ?? 'N/A' }}</td>
                        <td>{{ $data['Last Name'] ?? 'N/A' }}</td>
                        <td>{{ $data['Email'] ?? 'N/A' }}</td>
                        <td>{{ $data['Phone'] ?? 'N/A' }}</td>
                        <td>{{ $data['Message'] ?? 'N/A' }}</td>
                        <td>{{ now()->format('Y-m-d H:i:s') }}</td> <!-- Approximate time, file doesn't store it -->
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px;">No messages received yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <a href="{{ route('admin.dashboard') }}" class="back-button">Back to Dashboard</a>
</div>
@endsection