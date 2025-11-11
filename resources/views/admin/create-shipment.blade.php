@extends('layouts.app')

@section('content')
<style>
.create-shipment-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f8f9fa;
    min-height: 100vh;
}
.page-header {
    background: linear-gradient(135deg, #ff6200 0%, #ff8533 100%);
    color: white;
    padding: 30px;
    border-radius: 15px;
    margin-bottom: 30px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(255, 98, 0, 0.2);
}
.page-header h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
.page-header p {
    margin: 10px 0 0 0;
    opacity: 0.9;
    font-size: 1.1rem;
}
.form-container {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    overflow: hidden;
}
.form-section {
    padding: 30px;
    border-bottom: 1px solid #e9ecef;
    position: relative;
}
.form-section:last-child {
    border-bottom: none;
}
.section-header {
    display: flex;
    align-items: center;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px solid #ff6200;
}
.section-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #ff6200, #ff8533);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 20px;
    margin-right: 15px;
}
.section-title {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
    margin: 0;
}
.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}
.form-group {
    margin-bottom: 20px;
}
.form-label {
    display: block;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
    font-size: 14px;
}
.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
}
.form-control:focus {
    outline: none;
    border-color: #ff6200;
    background-color: white;
    box-shadow: 0 0 0 3px rgba(255, 98, 0, 0.1);
}
.form-control:hover {
    border-color: #ff8533;
}
textarea.form-control {
    resize: vertical;
    min-height: 100px;
}
.file-upload-area {
    border: 2px dashed #ff6200;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    background-color: #fff8f5;
    transition: all 0.3s ease;
    cursor: pointer;
}
.file-upload-area:hover {
    background-color: #fff0e6;
    border-color: #ff8533;
}
.file-upload-icon {
    font-size: 48px;
    color: #ff6200;
    margin-bottom: 15px;
}
.action-buttons {
    padding: 30px;
    background-color: #f8f9fa;
    display: flex;
    gap: 15px;
    justify-content: center;
    flex-wrap: wrap;
}
.btn {
    padding: 15px 30px;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    min-width: 150px;
    justify-content: center;
}
.btn-primary {
    background: linear-gradient(135deg, #ff6200, #ff8533);
    color: white;
    box-shadow: 0 4px 15px rgba(255, 98, 0, 0.3);
}
.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 98, 0, 0.4);
}
.btn-secondary {
    background: linear-gradient(135deg, #6c757d, #5a6268);
    color: white;
    box-shadow: 0 4px 15px rgba(108, 117, 125, 0.3);
}
.btn-secondary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(108, 117, 125, 0.4);
}
.success-message {
    background-color: #d4edda;
    color: #155724;
    padding: 15px 20px;
    border-radius: 8px;
    border-left: 4px solid #28a745;
    margin-top: 20px;
    font-weight: 500;
}
.error-message {
    background-color: #f8d7da;
    color: #721c24;
    padding: 15px 20px;
    border-radius: 8px;
    border-left: 4px solid #dc3545;
    margin-bottom: 20px;
    font-weight: 500;
}
.required-indicator {
    color: #dc3545;
    font-weight: bold;
}
.form-help {
    font-size: 12px;
    color: #6c757d;
    margin-top: 5px;
}
.preview-area {
    margin-top: 15px;
    padding: 15px;
    background-color: #e8f5e8;
    border-radius: 8px;
    border-left: 4px solid #28a745;
    display: none;
}
input[type="text"], input[type="date"], input[type="time"], select, textarea {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    font-family: inherit;
}
input[name="sender_email"], input[name="receiver_email"] {
    font-family: inherit;
    -webkit-user-modify: read-write-plaintext-only;
}
@media (max-width: 768px) {
    .create-shipment-container {
        padding: 15px;
    }
    .page-header {
        padding: 20px;
    }
    .page-header h1 {
        font-size: 2rem;
    }
    .form-section {
        padding: 20px;
    }
    .form-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    .btn {
        width: 100%;
        max-width: 300px;
    }
    .section-header {
        flex-direction: column;
        text-align: center;
        gap: 10px;
    }
    .section-icon {
        margin-right: 0;
    }
}
@media (max-width: 480px) {
    .form-control {
        padding: 10px 12px;
        font-size: 14px;
    }
    .file-upload-area {
        padding: 20px;
    }
    .file-upload-icon {
        font-size: 36px;
    }
}
</style>

<div class="create-shipment-container">
    <div class="page-header">
        <h1><i class="fas fa-plus-circle"></i> Create New Shipment</h1>
        <p>Fill in the details below to create a new shipment tracking record</p>
    </div>

    @if ($errors->any())
        <div class="error-message">
            <i class="fas fa-exclamation-triangle"></i>
            <strong>Please fix the following errors:</strong>
            <ul style="margin: 10px 0 0 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.shipments.store') }}" enctype="multipart/form-data" id="shipmentForm" novalidate>
        @csrf
        <div class="form-container">
            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h2 class="section-title">Sender Information</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="sender_name" class="form-label">
                            <i class="fas fa-user"></i> Sender Name <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="sender_name" id="sender_name"
                               value="{{ old('sender_name') }}" required
                               placeholder="Enter sender's full name">
                        <div class="form-help">Full name of the person sending the package</div>
                    </div>
                    <div class="form-group">
                        <label for="sender_email" class="form-label">
                            <i class="fas fa-envelope"></i> Sender Email
                        </label>
                        <input type="text" class="form-control" name="sender_email" id="sender_email"
                               value="{{ old('sender_email') }}"
                               placeholder="Enter email or 'ENCRYPTED' (Optional)"
                               autocomplete="off" autocorrect="off" spellcheck="false">
                        <div class="form-help">Enter a valid email, 'ENCRYPTED', or leave empty (Optional)</div>
                    </div>
                    <div class="form-group">
                        <label for="sender_phone" class="form-label">
                            <i class="fas fa-phone"></i> Sender Phone <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="sender_phone" id="sender_phone"
                               value="{{ old('sender_phone') }}" required
                               placeholder="+1 (555) 123-4567">
                        <div class="form-help">Contact number with country code</div>
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label for="sender_address" class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Sender Address <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="sender_address" id="sender_address"
                               value="{{ old('sender_address') }}" required
                               placeholder="Enter complete sender address with city, state, and postal code">
                        <div class="form-help">Complete pickup address including city, state, and postal code</div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <h2 class="section-title">Receiver Information</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="receiver_name" class="form-label">
                            <i class="fas fa-user"></i> Receiver Name <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="receiver_name" id="receiver_name"
                               value="{{ old('receiver_name') }}" required
                               placeholder="Enter receiver's full name">
                        <div class="form-help">Full name of the person receiving the package</div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_email" class="form-label">
                            <i class="fas fa-envelope"></i> Receiver Email
                        </label>
                        <input type="text" class="form-control" name="receiver_email" id="receiver_email"
                               value="{{ old('receiver_email') }}"
                               placeholder="Enter email or 'ENCRYPTED' (Optional)"
                               autocomplete="off" autocorrect="off" spellcheck="false">
                        <div class="form-help">Enter a valid email, 'ENCRYPTED', or leave empty (Optional)</div>
                    </div>
                    <div class="form-group">
                        <label for="receiver_phone" class="form-label">
                            <i class="fas fa-phone"></i> Receiver Phone <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="receiver_phone" id="receiver_phone"
                               value="{{ old('receiver_phone') }}" required
                               placeholder="+1 (555) 123-4567">
                        <div class="form-help">Contact number for delivery coordination</div>
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label for="receiver_address" class="form-label">
                            <i class="fas fa-map-marker-alt"></i> Receiver Address <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="receiver_address" id="receiver_address"
                               value="{{ old('receiver_address') }}" required
                               placeholder="Enter complete delivery address with city, state, and postal code">
                        <div class="form-help">Complete delivery address including city, state, and postal code</div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-box"></i>
                    </div>
                    <h2 class="section-title">Package Information</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="package_name" class="form-label">
                            <i class="fas fa-tag"></i> Package Name <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="package_name" id="package_name"
                               value="{{ old('package_name') }}" required
                               placeholder="Enter package description">
                        <div class="form-help">Brief description of the package contents</div>
                    </div>
                    <div class="form-group">
                        <label for="weight" class="form-label">
                            <i class="fas fa-weight-hanging"></i> Weight <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="weight" id="weight"
                               value="{{ old('weight') }}" required
                               placeholder="e.g., 2.5 kg">
                        <div class="form-help">Package weight with unit (kg, lbs, etc.)</div>
                    </div>
                    <div class="form-group">
                        <label for="origin" class="form-label">
                            <i class="fas fa-map-pin"></i> Origin/Departure Location <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="origin" id="origin"
                               value="{{ old('origin') }}" required
                               placeholder="Enter departure location">
                        <div class="form-help">Location where the package will depart from</div>
                    </div>
                    <div class="form-group">
                        <label for="destination" class="form-label">
                            <i class="fas fa-flag-checkered"></i> Destination <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="destination" id="destination"
                               value="{{ old('destination') }}" required
                               placeholder="Enter destination location">
                        <div class="form-help">Final destination location</div>
                    </div>
                    <div class="form-group">
                        <label for="carrier" class="form-label">
                            <i class="fas fa-truck"></i> Carrier <span class="required-indicator">*</span>
                        </label>
                        <select class="form-control" name="carrier" id="carrier" required>
                            <option value="">Select Carrier</option>
                            <option value="FEDEX Affiliate" {{ old('carrier') == 'FEDEX Affiliate' ? 'selected' : '' }}>FEDEX Affiliate</option>
                            <option value="SHIPEX Express" {{ old('carrier') == 'SHIPEX Express' ? 'selected' : '' }}>SHIPEX Express</option>
                            <option value="SHIPEX Standard" {{ old('carrier') == 'SHIPEX Standard' ? 'selected' : '' }}>SHIPEX Standard</option>
                            <option value="SHIPEX Air" {{ old('carrier') == 'SHIPEX Air' ? 'selected' : '' }}>SHIPEX Air</option>
                            <option value="SHIPEX Ground" {{ old('carrier') == 'SHIPEX Ground' ? 'selected' : '' }}>SHIPEX Ground</option>
                            <option value="SHIPEX International" {{ old('carrier') == 'SHIPEX International' ? 'selected' : '' }}>SHIPEX International</option>
                        </select>
                        <div class="form-help">Select the carrier service</div>
                    </div>
                    <div class="form-group">
                        <label for="carrier_reference_no" class="form-label">
                            <i class="fas fa-hashtag"></i> Carrier Reference No <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="carrier_reference_no" id="carrier_reference_no"
                               value="{{ old('carrier_reference_no') }}" required
                               placeholder="Enter carrier reference number">
                        <div class="form-help">Internal carrier reference number</div>
                    </div>
                    <div class="form-group">
                        <label for="departure_date" class="form-label">
                            <i class="fas fa-calendar-alt"></i> Departure Date <span class="required-indicator">*</span>
                        </label>
                        <input type="date" class="form-control" name="departure_date" id="departure_date"
                               value="{{ old('departure_date') }}" required>
                        <div class="form-help">Date when package will depart</div>
                    </div>
                    <div class="form-group">
                        <label for="expected_delivery_date" class="form-label">
                            <i class="fas fa-calendar-check"></i> Expected Delivery Date <span class="required-indicator">*</span>
                        </label>
                        <input type="date" class="form-control" name="expected_delivery_date" id="expected_delivery_date"
                               value="{{ old('expected_delivery_date') }}" required>
                        <div class="form-help">Estimated delivery date</div>
                    </div>
                    <div class="form-group">
                        <label for="delivery_time" class="form-label">
                            <i class="fas fa-clock"></i> Delivery Time <span class="required-indicator">*</span>
                        </label>
                        <input type="time" class="form-control" name="delivery_time" id="delivery_time"
                               value="{{ old('delivery_time') }}" required>
                        <div class="form-help">Expected delivery time</div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h2 class="section-title">Initial Status Information</h2>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="status" class="form-label">
                            <i class="fas fa-flag"></i> Initial Status <span class="required-indicator">*</span>
                        </label>
                        <input type="text" class="form-control" name="status" id="status"
                               value="{{ old('status') }}" required
                               placeholder="Enter initial status (e.g., Pending, In Transit, Custom)">
                        <div class="form-help">Enter any custom initial status for the shipment</div>
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label for="status_message" class="form-label">
                            <i class="fas fa-comment"></i> Status Message
                        </label>
                        <textarea class="form-control" name="status_message" id="status_message" rows="4"
                                  placeholder="Enter initial status message (Optional)">{{ old('status_message') }}</textarea>
                        <div class="form-help">Detailed message about the current status (Optional)</div>
                    </div>
                </div>
            </div>

            <div class="form-section">
                <div class="section-header">
                    <div class="section-icon">
                        <i class="fas fa-camera"></i>
                    </div>
                    <h2 class="section-title">Package Image</h2>
                </div>
                <div class="file-upload-area" onclick="document.getElementById('image').click()">
                    <div class="file-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <label for="image" class="form-label" style="cursor: pointer; margin: 0;">
                        <strong>Upload Package Image</strong>
                        <br>
                        <small>Click to browse or drag and drop (Optional)</small>
                    </label>
                    <input type="file" class="form-control" name="image" id="image" accept="image/*" style="display: none;">
                    <div class="form-help">Upload an image of the package (JPG, PNG, GIF - Max 2MB)</div>
                </div>
                <div class="preview-area" id="imagePreview">
                    <i class="fas fa-check-circle"></i>
                    <strong>Image Selected:</strong>
                    <span id="fileName"></span>
                </div>
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn btn-primary" id="submitBtn" formnovalidate>
                    <i class="fas fa-plus-circle"></i> Create Shipment
                </button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>
        </div>
    </form>

    @if(session('success'))
        <div class="success-message">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif
</div>

<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const previewArea = document.getElementById('imagePreview');
    const fileName = document.getElementById('fileName');
    if (file) {
        fileName.textContent = file.name;
        previewArea.style.display = 'block';
        const uploadArea = document.querySelector('.file-upload-area');
        uploadArea.style.backgroundColor = '#e8f5e8';
        uploadArea.style.borderColor = '#28a745';
    }
});

document.getElementById('shipmentForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const requiredFields = document.querySelectorAll('[required]');
    let isValid = true;

    requiredFields.forEach(field => {
        field.style.borderColor = '#e9ecef';
    });

    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.style.borderColor = '#dc3545';
            isValid = false;
        } else {
            field.style.borderColor = '#28a745';
        }
    });

    const emailFields = [document.getElementById('sender_email'), document.getElementById('receiver_email')];
    emailFields.forEach(field => {
        if (field.value.trim() && field.value.toUpperCase() !== 'ENCRYPTED') {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(field.value)) {
                field.style.borderColor = '#dc3545';
                isValid = false;
            } else {
                field.style.borderColor = '#28a745';
            }
        } else if (field.value.toUpperCase() === 'ENCRYPTED') {
            field.style.borderColor = '#28a745';
        }
    });

    if (!isValid) {
        alert('Please fill in all required fields marked with * and ensure email fields contain a valid email or "ENCRYPTED".');
        return;
    }

    this.submit();
});

document.getElementById('carrier').addEventListener('change', function() {
    const carrierRefField = document.getElementById('carrier_reference_no');
    if (this.value && !carrierRefField.value) {
        const timestamp = Date.now().toString().slice(-6);
        const prefix = this.value.replace(/\s+/g, '').substring(0, 3).toUpperCase();
        carrierRefField.value = prefix + '-' + timestamp;
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('departure_date').min = today;
    document.getElementById('expected_delivery_date').min = today;
});

document.getElementById('departure_date').addEventListener('change', function() {
    const departureDate = new Date(this.value);
    const expectedDeliveryField = document.getElementById('expected_delivery_date');
    if (!expectedDeliveryField.value) {
        departureDate.setDate(departureDate.getDate() + 5);
        expectedDeliveryField.value = departureDate.toISOString().split('T')[0];
    }
});
</script>
@endsection