<h4 class="card-title">Basic Information</h4>
<div class="mb-3 row {{ $errors->has('package_id') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Package</label>
    <div class="col-sm-9">
        {{ Form::select('package_id', \App\Models\Package::get()->pluck('name', 'id'), null, ['class' => 'form-control select2', 'placeholder' => 'Please Select', 'id' => 'package_id']) }}
        @error('package_id')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('name') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Name</label>
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control', 'required']) }}
        @error('name')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('phone') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Phone Number</label>
    <div class="col-sm-9">
        {{ Form::tel('phone', null, ['class' => 'form-control', 'required']) }}
        @error('phone')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('email') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Email</label>
    <div class="col-sm-9">
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Customer Email (optional)']) }}
        @error('email')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('pick_up_time') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Pick Up Time</label>
    <div class="col-sm-9">
        {!! Form::text('pick_up_time', isset($booking) ? \Carbon\Carbon::parse($booking->pick_up_time)->format('H:i') : null, [
            'id' => 'pick_up_time',
            'class' => 'form-control time-picker',
            'placeholder' => 'Pick Up Time (must be at least 45 minutes from now)*',
            'required',
        ]) !!}
        @error('pick_up_time')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div id="return_time_row" class="mb-3 row {{ $errors->has('return_time') ? 'has-danger' : '' }}" style="display: none;">
    <label class="col-sm-3 text-end control-label col-form-label">Return Time</label>
    <div class="col-sm-9">
        {!! Form::text('return_time', isset($booking) && $booking->return_time ? \Carbon\Carbon::parse($booking->return_time)->format('H:i') : null, [
            'id' => 'return_time',
            'class' => 'form-control time-picker ' . ($errors->has('return_time') ? 'is-invalid' : ''),
            'placeholder' => 'Return Time (make sure it is at least 3 hours from pick up time)*',
        ]) !!}
        @error('return_time')
            <small class="form-control-feedback text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div id="charter_hours_row" class="mb-3 row {{ $errors->has('no_of_charter_hours') ? 'has-danger' : '' }}" style="display: none;">
    <label class="col-sm-3 text-end control-label col-form-label">No of Charter Hours</label>
    <div class="col-sm-9">
        {{ Form::text('no_of_charter_hours', null, [
            'id' => 'no_of_charter_hours',
            'class' => 'form-control ' . ($errors->has('no_of_charter_hours') ? 'is-invalid' : ''),
        ]) }}
        @error('no_of_charter_hours')
            <small class="form-control-feedback text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('pick_up_date') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Pick Up Date</label>
    <div class="col-sm-9">
        {!! Form::text('pick_up_date', null, [
            'id' => 'pick_up_date',
            'class' => 'form-control date-picker',
            'placeholder' => 'Pick Up Date*',
            'required',
        ]) !!}
        @error('pick_up_date')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('pick_up_address') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Pick Up Address</label>
    <div class="col-sm-9">
        {{ Form::text('pick_up_address', null, ['class' => 'form-control', 'id' => 'pick_up_address', 'required']) }}
        @error('pick_up_address')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('drop_off_address') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Drop Off Address</label>
    <div class="col-sm-9">
        {{ Form::text('drop_off_address', null, ['class' => 'form-control', 'id' => 'drop_off_address', 'required']) }}
        @error('drop_off_address')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('no_of_passenger') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">No of Passengers</label>
    <div class="col-sm-9">
        {{ Form::text('no_of_passenger', null, ['class' => 'form-control', 'required']) }}
        @error('no_of_passenger')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('no_of_wheelchair_pax') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">No of Wheelchair Pax</label>
    <div class="col-sm-9">
        {{ Form::text('no_of_wheelchair_pax', null, ['class' => 'form-control', 'required']) }}
        @error('no_of_wheelchair_pax')
            <small class="form-control-feedback">{{ $message }}</small>
        @enderror
    </div>
</div>

{{ Form::hidden('distance', null, ['id' => 'distance']) }}

@push('scripts')
    <script>
        let autocompletePickUp;
        let autocompleteDropOff;

        function initAutocomplete() {
            let pickUpInput = document.querySelector('input[id="pick_up_address"]');
            let dropOffInput = document.querySelector('input[id="drop_off_address"]');

            if (pickUpInput && dropOffInput) {
                autocompletePickUp = new google.maps.places.Autocomplete(pickUpInput, {
                    fields: ['address_components', 'geometry'],
                });

                autocompleteDropOff = new google.maps.places.Autocomplete(dropOffInput, {
                    fields: ['address_components', 'geometry'],
                });

                autocompletePickUp.addListener('place_changed', calculateAndDisplayRoute);
                autocompleteDropOff.addListener('place_changed', calculateAndDisplayRoute);
            }
        }

        function calculateAndDisplayRoute() {
            let pickUpAddressInput = document.querySelector('input[id="pick_up_address"]');
            let dropOffAddressInput = document.querySelector('input[id="drop_off_address"]');
            let distanceInput = document.querySelector('input[id="distance"]');

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
                    } else {
                        console.error('Error fetching directions:', status);
                    }
                });
            }
        }

        function loadGoogleMapsAPI() {
            let script = document.createElement('script');
            script.src =
                'https://maps.googleapis.com/maps/api/js?v=weekly&key=AIzaSyDyDBj18KcjAEadpGxHkZYJBCo54j4dvro&callback=initAutocomplete&libraries=places,geometry';
            script.async = true;
            script.defer = true;
            script.setAttribute('loading', 'async');
            document.head.appendChild(script);
        }

        document.addEventListener('DOMContentLoaded', function() {
            let packageSelect = document.getElementById('package_id');
            let returnTimeRow = document.getElementById('return_time_row');
            let charterHoursRow = document.getElementById('charter_hours_row');
            let returnTimeInput = document.getElementById('return_time');
            let charterHoursInput = document.getElementById('no_of_charter_hours');

            function updateFieldsVisibility() {
                if (packageSelect) {
                    let selectedPackage = packageSelect.options[packageSelect.selectedIndex].text;

                    // Reset visibility and required attributes
                    returnTimeRow.style.display = 'none';
                    charterHoursRow.style.display = 'none';
                    returnTimeInput.removeAttribute('required');
                    charterHoursInput.removeAttribute('required');

                    if (selectedPackage === 'Return') {
                        returnTimeRow.style.display = 'flex';
                        returnTimeInput.setAttribute('required', 'required');

                        // Check if there's an error and apply the danger class
                        if (returnTimeRow.querySelector('.form-control-feedback')) {
                            returnTimeRow.classList.add('has-danger');
                        }
                    } else if (selectedPackage === 'Charter') {
                        charterHoursRow.style.display = 'flex';
                        charterHoursInput.setAttribute('required', 'required');

                        // Check if there's an error and apply the danger class
                        if (charterHoursRow.querySelector('.form-control-feedback')) {
                            charterHoursRow.classList.add('has-danger');
                        }
                    }
                }
            }

            // Run the function initially to check the currently selected package
            updateFieldsVisibility();

            // Add event listener for package change
            if (packageSelect) {
                packageSelect.addEventListener('change', updateFieldsVisibility);
            }

            // Initialize date and time pickers
            $('.date-picker').datetimepicker({
                datepicker: true,
                timepicker: false,
                format: 'Y-m-d',
                step: 15,
                scrollInput: false
            });

            $('.time-picker').datetimepicker({
                datepicker: false,
                timepicker: true,
                format: 'H:i',
                step: 5,
                minTime: '07:00',
                maxTime: '21:00',
                scrollInput: false
            });

            loadGoogleMapsAPI();
        });
    </script>
@endpush
