<h4 class="card-title">Basic Information</h4>
<div class="mb-3 row {{ $errors->has('package_id') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Package</label>
    <div class="col-sm-9">
        {{ Form::select('package_id', \App\Models\Package::get()->pluck('name', 'id'), null, ['class' => 'form-control select2', 'placeholder' => 'Please Select', 'id' => 'package_id']) }}
        @error('package_id')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('name') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Name</label>
    <div class="col-sm-9">
        {{ Form::text('name', null, ['class' => 'form-control']) }}
        @error('name')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('phone') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Phone Number</label>
    <div class="col-sm-9">
        {{ Form::tel('phone', null, ['class' => 'form-control']) }}
        @error('phone')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
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
        ]) !!}
        @error('pick_up_time')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('return_time') ? 'has-danger' : '' }}" id="return_time_row" style="display:none;">
    <label class="col-sm-3 text-end control-label col-form-label">Return Time</label>
    <div class="col-sm-9">
        {!! Form::text('return_time', isset($booking) ? \Carbon\Carbon::parse($booking->return_time)->format('H:i') : null, [
            'id' => 'return_time',
            'class' => 'form-control time-picker',
            'placeholder' => 'Return Time (make sure it is at least 3 hours from pick up time)*',
        ]) !!}
        @error('return_time')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>

<div class="mb-3 row {{ $errors->has('no_of_charter_hours') ? 'has-danger' : '' }}" id="charter_hours_row" style="display:none;">
    <label class="col-sm-3 text-end control-label col-form-label">No of Charter Hours</label>
    <div class="col-sm-9">
        {{ Form::text('no_of_charter_hours', null, ['class' => 'form-control']) }}
        @error('no_of_charter_hours')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
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
        ]) !!}
        @error('pick_up_date')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('pick_up_address') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Pick Up Address</label>
    <div class="col-sm-9">
        {{ Form::text('pick_up_address', null, ['class' => 'form-control', 'id' => 'pick_up_address']) }}
        @error('pick_up_address')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('drop_off_address') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">Drop Off Address</label>
    <div class="col-sm-9">
        {{ Form::text('drop_off_address', null, ['class' => 'form-control', 'id' => 'drop_off_address']) }}
        @error('drop_off_address')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('no_of_passenger') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">No of Passengers</label>
    <div class="col-sm-9">
        {{ Form::text('no_of_passenger', null, ['class' => 'form-control']) }}
        @error('no_of_passenger')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
        @enderror
    </div>
</div>
<div class="mb-3 row {{ $errors->has('no_of_wheelchair_pax') ? 'has-danger' : '' }}">
    <label class="col-sm-3 text-end control-label col-form-label">No of Wheelchair Pax</label>
    <div class="col-sm-9">
        {{ Form::text('no_of_wheelchair_pax', null, ['class' => 'form-control']) }}
        @error('no_of_wheelchair_pax')
            <small class="form-control-feedback">
                {{ $message }}
            </small>
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

        function initializeDateTimePickers() {
            let datePickers = document.querySelectorAll('.date-picker');
            let timePickers = document.querySelectorAll('.time-picker');

            datePickers.forEach(function(picker) {
                $(picker).datetimepicker({
                    datepicker: true,
                    timepicker: false,
                    format: 'Y-m-d',
                    step: 15,
                    scrollInput: false
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

        function checkSelectedPackageOnLoad() {
            let packageSelect = document.getElementById('package_id');
            let selectedPackage = packageSelect.options[packageSelect.selectedIndex].text;
            let returnTimeRow = document.getElementById('return_time_row');
            let charterHoursRow = document.getElementById('charter_hours_row');

            if (selectedPackage === 'Return') {
                returnTimeRow.style.display = 'flex';
                charterHoursRow.style.display = 'none';
            } else if (selectedPackage === 'Charter') {
                returnTimeRow.style.display = 'none';
                charterHoursRow.style.display = 'flex';
            } else {
                returnTimeRow.style.display = 'none';
                charterHoursRow.style.display = 'none';
            }
        }

        function toggleFieldsBasedOnPackage() {
            let packageSelect = document.getElementById('package_id');
            let returnTimeRow = document.getElementById('return_time_row');
            let charterHoursRow = document.getElementById('charter_hours_row');

            packageSelect.addEventListener('change', function() {
                let selectedPackage = packageSelect.options[packageSelect.selectedIndex].text;

                if (selectedPackage === 'Return') {
                    returnTimeRow.style.display = 'flex';
                    charterHoursRow.style.display = 'none';
                } else if (selectedPackage === 'Charter') {
                    returnTimeRow.style.display = 'none';
                    charterHoursRow.style.display = 'flex';
                } else {
                    returnTimeRow.style.display = 'none';
                    charterHoursRow.style.display = 'none';
                }
            });

            checkSelectedPackageOnLoad();
        }


        document.addEventListener('DOMContentLoaded', function() {
            loadGoogleMapsAPI();
            initializeDateTimePickers();
            toggleFieldsBasedOnPackage();
        });
    </script>
@endpush
