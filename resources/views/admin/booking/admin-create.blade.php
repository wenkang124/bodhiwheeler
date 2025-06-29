@extends('admin.layouts.index')

@push('breadcrumb')
    <div class="row">
        <div class="col-md align-self-center">
            <h3 class="page-title">Create Booking</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.booking.approved-booking') }}">Bookings</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Create Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css">
<style>
    /* Package Tab Styling */
    .package-tabs {
        border-bottom: none !important;
        margin-bottom: 2rem;
    }

    .package-tabs .nav-item {
        margin-right: 15px;
    }

    .package-tabs .nav-link {
        border: 2px solid #007bff !important;
        color: #007bff !important;
        background: white !important;
        border-radius: 8px !important;
        padding: 12px 24px !important;
        font-weight: 600;
        transition: all 0.3s ease;
        text-decoration: none;
        position: relative;
    }

    .package-tabs .nav-link:hover {
        background: #f8f9fa !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,123,255,0.2);
    }

    .package-tabs .nav-link.active {
        background: #007bff !important;
        color: white !important;
        border-color: #007bff !important;
        box-shadow: 0 4px 12px rgba(0,123,255,0.3);
    }

    /* Form Styling */
    .booking-form {
        padding: 2rem;
        background: #f8f9fa;
        border-radius: 10px;
        margin-top: 1rem;
    }

    .booking-form .form-control {
        margin-bottom: 1.5rem !important;
        padding: 12px 15px;
        border-radius: 8px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .booking-form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
        transform: translateY(-1px);
    }

    .booking-form .form-control::placeholder {
        color: #6c757d;
        font-weight: 500;
    }

    /* Row spacing */
    .booking-form .row {
        margin-bottom: 1rem;
    }

    /* Column spacing */
    .booking-form [class*="col-"] {
        padding-left: 10px;
        padding-right: 10px;
        margin-bottom: 1rem;
    }

    /* Button styling - match admin form buttons */
    .booking-form .btn {
        padding: 8px 16px;
        font-weight: 500;
        border-radius: 4px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .booking-form .btn:hover {
        transform: none;
        box-shadow: none;
    }

    /* Section headers - black text, no icons */
    .booking-form h5 {
        color: #212529 !important;
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 1rem;
        border-bottom: 1px solid #dee2e6;
        padding-bottom: 0.5rem;
    }

    /* Error styling */
    .booking-form .is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
    }

    .alert {
        border-radius: 8px;
        margin-bottom: 2rem;
    }

    .alert-danger {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .alert-danger h5 {
        color: #721c24 !important;
        margin-bottom: 0.5rem;
    }

    /* Error message styling */
    .text-danger {
        font-size: 12px;
        margin-top: -10px;
        margin-bottom: 10px;
        display: block;
    }

    /* Tab content styling */
    .tab-content {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    /* Small text styling */
    .form-text {
        margin-top: -10px !important;
        margin-bottom: 15px !important;
        font-size: 12px;
    }

    /* Select dropdown styling */
    .booking-form select.form-control {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 12px center;
        background-repeat: no-repeat;
        background-size: 16px 12px;
        padding-right: 40px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .package-tabs .nav-link {
            padding: 10px 16px !important;
            font-size: 14px;
        }

        .booking-form {
            padding: 1rem;
        }

        .booking-form [class*="col-"] {
            margin-bottom: 1.5rem;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding">
                    <h4 class="card-title">Create New Booking</h4>
                    <h6 class="card-subtitle">Create a booking on behalf of a customer</h6>
                </div>
                <div class="card-body">
                    @php
                        // Determine active tab from session, old input, or default to first package
                        $activeTabName = session('active_tab') ?? old('active_tab') ?? $packages[0]->name;
                        $transformedActiveTab = strtolower(str_replace(' ', '_', $activeTabName));
                    @endphp

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5><i class="mdi mdi-alert-circle-outline me-2"></i>Please fix the following errors before submitting:</h5>
                            <ul class="mb-2">
                                @foreach ($errors->all() as $error)
                                    <li><strong>{{ $error }}</strong></li>
                                @endforeach
                            </ul>
                            <small class="text-muted">
                                <i class="mdi mdi-information-outline me-1"></i>
                                Fields with errors are highlighted in red. Please correct them and try again.
                            </small>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Package Selection Tabs -->
                    <ul class="nav nav-tabs package-tabs mb-4" id="bookingTabs" role="tablist">
                        @foreach ($packages as $package)
                            <li class="nav-item">
                                <a class="nav-link {{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) || ($loop->first && !old('active_tab')) ? 'active' : '' }}"
                                   id="{{ strtolower(str_replace(' ', '_', $package->name)) }}Tab"
                                   data-toggle="tab"
                                   href="#{{ strtolower(str_replace(' ', '_', $package->name)) }}Form"
                                   role="tab"
                                   aria-controls="{{ strtolower(str_replace(' ', '_', $package->name)) }}Form">
                                    {{ $package->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Package Forms -->
                    <div class="tab-content">
                        @foreach ($packages as $package)
                            <div class="tab-pane fade {{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) || ($loop->first && !old('active_tab')) ? 'show active' : '' }}"
                                 id="{{ strtolower(str_replace(' ', '_', $package->name)) }}Form"
                                 role="tabpanel"
                                 aria-labelledby="{{ strtolower(str_replace(' ', '_', $package->name)) }}Tab">

                                <form action="{{ route('admin.booking.store') }}" method="POST" class="booking-form">
                                    @csrf
                                    <div class="row justify-content-center">
                                        <!-- Customer Information Section -->
                                        <div class="col-12 mb-3">
                                            <h5>Customer Information</h5>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Customer Name*" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="Phone Number*" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" required>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                        </div>

                                        <!-- Trip Details Section -->
                                        <div class="col-12 mb-3 mt-4">
                                            <h5>Trip Details</h5>
                                        </div>

                                        <!-- Date Field -->
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <input type="text" name="pick_up_date" value="{{ old('pick_up_date') }}"
                                                   id="pick_up_date_{{ $package->id }}" class="form-control date-picker {{ $errors->has('pick_up_date') ? 'is-invalid' : '' }}"
                                                   placeholder="Pick Up Date*" required autocomplete="off">
                                        </div>

                                        <!-- Time Fields -->
                                        <div class="col-xl-{{ $package->name == 'One Way' ? '12' : '6' }} col-lg-{{ $package->name == 'One Way' ? '12' : '6' }} col-md-{{ $package->name == 'One Way' ? '12' : '6' }}">
                                            <input type="text" name="pick_up_time" value="{{ old('pick_up_time', \Carbon\Carbon::now()->addMinutes(45)->format('H:i')) }}"
                                                   id="pick_up_time_{{ $package->id }}" class="form-control time-picker {{ $errors->has('pick_up_time') ? 'is-invalid' : '' }}"
                                                   placeholder="Pick Up Time (must be at least 45 minutes from now)*" required>
                                        </div>

                                        @if ($package->name == 'Return')
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <input type="text" name="return_time" value="{{ old('return_time') }}"
                                                       id="return_time_{{ $package->id }}" class="form-control time-picker {{ $errors->has('return_time') ? 'is-invalid' : '' }}"
                                                       placeholder="Return Time (make sure it is at least 3 hours from pick up time)*" {{ $package->name == 'Return' ? 'required' : '' }}>
                                            </div>
                                        @endif

                                        @if ($package->name == 'Charter')
                                            <div class="col-xl-6 col-lg-6 col-md-6">
                                                <input type="number" name="no_of_charter_hours" value="{{ old('no_of_charter_hours') }}"
                                                       placeholder="No of Charter Hours (minimum 3)*" class="form-control {{ $errors->has('no_of_charter_hours') ? 'is-invalid' : '' }}" min="3" {{ $package->name == 'Charter' ? 'required' : '' }}>
                                            </div>
                                        @endif

                                        <!-- Location Section -->
                                        <div class="col-12 mb-3 mt-4">
                                            <h5>Location Details</h5>
                                        </div>

                                        <!-- Address Fields with Google Autocomplete -->
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <input type="text" name="pick_up_address" value="{{ old('pick_up_address') }}"
                                                   id="pick_up_address_{{ $package->id }}" class="form-control {{ $errors->has('pick_up_address') ? 'is-invalid' : '' }}"
                                                   placeholder="Pick Up Address*" required>
                                        </div>

                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <input type="text" name="drop_off_address" value="{{ old('drop_off_address') }}"
                                                   id="drop_off_address_{{ $package->id }}" class="form-control {{ $errors->has('drop_off_address') ? 'is-invalid' : '' }}"
                                                   placeholder="Drop Off Address*" required>
                                            <small class="form-text text-muted">
                                                Only Singapore addresses are allowed. For out-of-Singapore locations, please contact us via
                                                <a href="https://wa.me/6593682784" target="_blank">WhatsApp</a>.
                                            </small>
                                        </div>

                                        <!-- Passenger Information Section -->
                                        <div class="col-12 mb-3 mt-4">
                                            <h5>Passenger Information</h5>
                                        </div>

                                        <!-- Passenger Information -->
                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <input type="number" name="no_of_passenger" value="{{ old('no_of_passenger') }}"
                                                   placeholder="No of Passengers*" class="form-control {{ $errors->has('no_of_passenger') ? 'is-invalid' : '' }}" min="1" required>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6">
                                            <input type="number" name="no_of_wheelchair_pax" value="{{ old('no_of_wheelchair_pax') }}"
                                                   placeholder="No of Wheelchair Pax*" class="form-control {{ $errors->has('no_of_wheelchair_pax') ? 'is-invalid' : '' }}" min="0" required>
                                        </div>

                                        <!-- Admin Options Section -->
                                        <div class="col-12 mb-3 mt-4">
                                            <h5>Admin Options</h5>
                                        </div>

                                        <!-- Driver Assignment (Admin Only) -->
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <select name="driver_id" class="form-control {{ $errors->has('driver_id') ? 'is-invalid' : '' }}">
                                                <option value="">Assign Driver (Optional)</option>
                                                @foreach($drivers as $driver)
                                                    <option value="{{ $driver->id }}" {{ old('driver_id') == $driver->id ? 'selected' : '' }}>{{ $driver->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Hidden Fields -->
                                        <input type="hidden" name="package_id" value="{{ $package->id }}">
                                        <input type="hidden" name="active_tab" value="{{ $package->name }}">
                                        <input type="hidden" name="distance" value="{{ old('distance') }}" id="distance_{{ $package->id }}">

                                        <!-- Remarks -->
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <textarea name="remarks" placeholder="Additional Remarks or Special Instructions" class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" rows="4">{{ old('remarks') }}</textarea>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="col-12 text-center mt-4">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                                Create Booking
                                            </button>
                                            <a href="{{ route('admin.booking.approved-booking') }}" class="btn btn-secondary waves-effect waves-light ms-2">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
<script>
    let autocompletePickUp;
    let autocompleteDropOff;

    function initAutocomplete() {
        let activeTab = document.querySelector('.tab-pane.active');

        if (activeTab) {
            let pickUpInputs = activeTab.querySelectorAll('input[id^="pick_up_address"]');
            let dropOffInputs = activeTab.querySelectorAll('input[id^="drop_off_address"]');

            pickUpInputs.forEach(function(input) {
                autocompletePickUp = new google.maps.places.Autocomplete(input, {
                    fields: ['address_components', 'geometry'],
                    componentRestrictions: {
                        country: 'SG'
                    }
                });

                autocompletePickUp.addListener('place_changed', calculateAndDisplayRoute);
            });

            dropOffInputs.forEach(function(input) {
                autocompleteDropOff = new google.maps.places.Autocomplete(input, {
                    fields: ['address_components', 'geometry'],
                    componentRestrictions: {
                        country: 'SG'
                    }
                });

                autocompleteDropOff.addListener('place_changed', calculateAndDisplayRoute);
            });
        }
    }

    function calculateAndDisplayRoute() {
        let activeTab = document.querySelector('.tab-pane.active');
        let pickUpAddressInput = activeTab.querySelector('input[id^="pick_up_address"]');
        let dropOffAddressInput = activeTab.querySelector('input[id^="drop_off_address"]');
        let distanceInput = activeTab.querySelector('input[id^="distance"]');

        let pickUpAddress = pickUpAddressInput.value;
        let dropOffAddress = dropOffAddressInput.value;

        if (pickUpAddress && dropOffAddress) {
            let directionsService = new google.maps.DirectionsService();

            let request = {
                origin: pickUpAddress,
                destination: dropOffAddress,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(response, status) {
                if (status == 'OK') {
                    let distance = response.routes[0].legs[0].distance.value; // Distance in meters
                    let distanceInKm = distance / 1000;
                    distanceInput.value = distanceInKm.toFixed(2);
                    console.log('Distance calculated: ' + distanceInKm.toFixed(2) + ' km');
                } else {
                    console.error('Error fetching directions:', status);
                }
            });
        }
    }

    // Handle tab switching
    $('#bookingTabs a').on('click', function(e) {
        e.preventDefault();

        // Remove active class from all tabs and content
        $('#bookingTabs .nav-link').removeClass('active');
        $('.tab-pane').removeClass('show active');

        // Add active class to clicked tab
        $(this).addClass('active');

        // Show corresponding tab content
        let target = $(this).attr('href');
        $(target).addClass('show active');

        // Reinitialize Google Maps and date/time pickers for new tab
        setTimeout(function() {
            initAutocomplete();
            initializeDateTimePickers();
        }, 100);
    });

    // Also handle Bootstrap's tab events
    $('#bookingTabs a').on('shown.bs.tab', function(e) {
        initAutocomplete();
        initializeDateTimePickers();
    });

    function loadGoogleMapsAPI() {
        let script = document.createElement('script');
        script.src = 'https://maps.googleapis.com/maps/api/js?v=weekly&key=AIzaSyDyDBj18KcjAEadpGxHkZYJBCo54j4dvro&callback=initAutocomplete&libraries=places,geometry';
        script.async = true;
        script.defer = true;
        script.setAttribute('loading', 'async');
        document.head.appendChild(script);
    }

    function initializeDateTimePickers() {
        let activeTab = document.querySelector('.tab-pane.active');

        if (activeTab) {
            let datePickers = activeTab.querySelectorAll('.date-picker');
            let timePickers = activeTab.querySelectorAll('.time-picker');

            datePickers.forEach(function(picker) {
                $(picker).datetimepicker({
                    datepicker: true,
                    timepicker: false,
                    format: 'Y-m-d',
                    step: 15,
                    scrollInput: false,
                    disabledDates: ['2025-01-28', '2025-01-29', '2025-01-30', '2025-01-31'],
                    formatDate: 'Y-m-d',
                });

                $(picker).on('input', function() {
                    let inputDate = new Date(this.value);
                    let startDisabled = new Date('2025-01-28');
                    let endDisabled = new Date('2025-01-31');

                    if (inputDate >= startDisabled && inputDate <= endDisabled) {
                        this.value = '';
                        alert('This date is not available for booking.');
                    }
                });
            });

            timePickers.forEach(function(picker) {
                $(picker).datetimepicker({
                    datepicker: false,
                    timepicker: true,
                    format: 'H:i',
                    step: 5,
                    minTime: '07:00',
                    maxTime: '21:00',
                    scrollInput: false
                });
            });
        }
    }

    // Initialize Google Maps API
    loadGoogleMapsAPI();

    // Initialize Date Time Picker
    initializeDateTimePickers();

    // Scroll to errors if they exist
    @if ($errors->any())
        setTimeout(function() {
            $('html, body').animate({
                scrollTop: $('.alert-danger').offset().top - 100
            }, 500);
        }, 100);
    @endif

    // Maintain tab state on page load
    $(document).ready(function() {
        @if(session('active_tab') || old('active_tab'))
            let activeTabName = '{{ session('active_tab') ?? old('active_tab') }}';
            let tabId = activeTabName.toLowerCase().replace(' ', '_');

            // Remove active from all tabs
            $('#bookingTabs .nav-link').removeClass('active');
            $('.tab-pane').removeClass('show active');

            // Activate the correct tab
            $('#' + tabId + 'Tab').addClass('active');
            $('#' + tabId + 'Form').addClass('show active');

            // Reinitialize for the active tab
            setTimeout(function() {
                initAutocomplete();
                initializeDateTimePickers();
            }, 200);
        @endif
    });
</script>
@endpush
