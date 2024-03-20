@extends('public.layouts.index')
@push('meta')
    <title>Edit Booking | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb booking-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="part-txt">
                        <h1>Edit Booking</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->

    <!-- booking begin -->
    <div class="contact">
        <div class="container">
            @php
                $transformedActiveTab = strtolower(str_replace(' ', '_', $booking->package_name));
            @endphp
            <ul class="nav nav-tabs" id="bookingTabs" role="tablist">
                @foreach ($packages as $package)
                    <li class="nav-item col">
                        <a class="nav-link {{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) ? 'active' : '' }}" id="{{ strtolower(str_replace(' ', '_', $package->name)) }}Tab" data-toggle="tab" href="#{{ strtolower(str_replace(' ', '_', $package->name)) }}Form" role="tab" aria-controls="{{ strtolower(str_replace(' ', '_', $package->name)) }}Form"
                            aria-selected="{{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) ? 'true' : 'false' }}">
                            {{ $package->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($packages as $package)
                    <div class="tab-pane fade {{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) ? 'show active' : '' }}" id="{{ strtolower(str_replace(' ', '_', $package->name)) }}Form" role="tabpanel" aria-labelledby="{{ strtolower(str_replace(' ', '_', $package->name)) }}Tab">
                        {!! Form::open(['route' => 'booking.update-booking', 'method' => 'POST', 'class' => 'form booking-form']) !!}
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::text('name', $booking->name, ['placeholder' => 'Name*', 'required']) !!}
                                @error('name', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::tel('phone', $booking->phone, ['placeholder' => 'Phone Number*', 'required']) !!}
                                @error('phone', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-{{ $package->name == 'One Way' ? '10' : '5' }} col-lg-{{ $package->name == 'One Way' ? '10' : '5' }} col-md-{{ $package->name == 'One Way' ? '' : '6' }}">
                                {!! Form::time('pick_up_time', isset($booking) ? \Carbon\Carbon::parse($booking->pick_up_time)->format('H:i') : '', ['placeholder' => 'Pick Up Time (must be at least 45 minutes from now)*', 'required']) !!}
                                @error('pick_up_time', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($package->name == 'Return')
                                <div class="col-xl-5 col-lg-5 col-md-6">
                                    {!! Form::time('return_time', isset($booking) ? \Carbon\Carbon::parse($booking->return_time)->format('H:i') : '', ['placeholder' => 'Return Time']) !!}
                                    @error('return_time', $package->id)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if ($package->name == 'Charter')
                                <div class="col-xl-5 col-lg-5 col-md-6">
                                    {!! Form::number('no_of_charter_hours', $booking->no_of_charter_hours, ['placeholder' => 'No of Charter Hours', 'required']) !!}
                                    @error('no_of_charter_hours', $package->id)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div class="col-xl-10 col-lg-10">
                                {!! Form::date('pick_up_date', $booking->pick_up_date, ['placeholder' => 'Pick Up Date*', 'required']) !!}
                                @error('pick_up_date', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                {!! Form::text('pick_up_address', $booking->pick_up_address, [
                                    'id' => 'pick_up_address',
                                    'placeholder' => 'Pick Up Address*',
                                    'required',
                                ]) !!}
                                @error('pick_up_address', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                {!! Form::text('drop_off_address', $booking->drop_off_address, [
                                    'id' => 'drop_off_address',
                                    'placeholder' => 'Drop Off Address*',
                                    'required',
                                ]) !!}
                                @error('drop_off_address', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::number('no_of_passenger', $booking->no_of_passenger, ['placeholder' => 'No of Passengers*', 'required']) !!}
                                @error('no_of_passenger', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::number('no_of_wheelchair_pax', $booking->no_of_wheelchair_pax, ['placeholder' => 'No of Wheelchair Pax*', 'required']) !!}
                                @error('no_of_wheelchair_pax', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($package->name == 'Return' || $package->name == 'Charter')
                                <div class="col-xl-10 col-lg-10 text-left">
                                    <div class="form-check form-check-inline medical-escort-form">
                                        {!! Form::label('medical_escort_checkbox', 'Medical Escort', [
                                            'class' => 'form-check-label py-0 pr-2 medical-label',
                                            'style' => 'white-space: nowrap;',
                                        ]) !!}
                                        {!! Form::checkbox('medical_escort', '1', $booking->medical_escort ?? false, [
                                            'class' => 'medical-escort',
                                            'id' => 'medical_escort_checkbox',
                                            'data-on-value' => '1',
                                            'data-off-value' => '0',
                                            'value' => '0',
                                            'checked' => isset($booking->medical_escort) && $booking->medical_escort,
                                        ]) !!}
                                    </div>
                                    @error('medical_escort', $package->id)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            {!! Form::hidden('package_id', $package->id) !!}
                            {!! Form::hidden('booking_id', $booking->id) !!}
                            {!! Form::hidden('active_tab', $package->name) !!}
                            {!! Form::hidden('distance', $booking->distance ?? '', ['id' => 'distance']) !!}

                            <div class="col-xl-10 col-lg-10 text-right">
                                {!! Form::textarea('remarks', $booking->remarks, ['placeholder' => 'Remarks']) !!}
                                <button class="g-recaptcha def-btn def-btn-2" data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit' data-action='submit'>Confirm</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- booking end -->

    <!-- process begin -->
    @include('public.components.booking-process')
    <!-- process end -->

    <!-- pricing begin -->
    @include('public.components.price-list')
    <!-- pricing end -->

    <!-- call back begin -->
    @include('public.components.call-back')
    <!-- call back end -->
@endsection

@push('scripts')
    <script>
        function onSubmit(token) {
            var activeForm = $('.tab-pane.active form');

            if (activeForm[0].reportValidity()) {
                $('button.g-recaptcha').replaceWith(' <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>');
                activeForm.submit();
            }
        }

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
                    });

                    autocompletePickUp.addListener('place_changed', calculateAndDisplayRoute);
                });

                dropOffInputs.forEach(function(input) {
                    autocompleteDropOff = new google.maps.places.Autocomplete(input, {
                        fields: ['address_components', 'geometry'],
                    });

                    autocompleteDropOff.addListener('place_changed', calculateAndDisplayRoute);
                });
            }
        }

        function calculateAndDisplayRoute() {
            let activeTab = document.querySelector('.tab-pane.active');
            let pickUpAddressInput = activeTab.querySelector('input[id^="pick_up_address"]');
            let dropOffAddressInput = activeTab.querySelector('input[id^="drop_off_address"]');
            let distanceInput = activeTab.querySelector('input[id="distance"]');

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

                        distanceInput.value = distanceInKm.toFixed(2)
                    } else {
                        console.error('Error fetching directions:', status);
                    }
                });
            }
        }

        $('#bookingTabs a').on('shown.bs.tab', function(e) {
            initAutocomplete();
        });

        function loadGoogleMapsAPI() {
            let script = document.createElement('script');
            script.src = 'https://maps.googleapis.com/maps/api/js?v=weekly&key=AIzaSyDyDBj18KcjAEadpGxHkZYJBCo54j4dvro&callback=initAutocomplete&libraries=places,geometry';
            script.async = true;
            script.defer = true;
            script.setAttribute('loading', 'async');
            document.head.appendChild(script);
        }

        window.onload = loadGoogleMapsAPI;
    </script>
@endpush
