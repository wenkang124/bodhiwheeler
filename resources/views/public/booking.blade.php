@extends('public.layouts.index')
@push('meta')
    <title>Booking | Affordable Wheelchair Transport Singapore | BodhiWheeler</title>
@endpush
@section('content')
    <!-- breadcrumb begin -->
    <div class="breadcrumb booking-breadcrumb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-5">
                    <div class="part-txt">
                        <h1>Booking</h1>
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
                $transformedActiveTab = strtolower(str_replace(' ', '_', old('active_tab', $packages[0]->name))); // Assuming $packages is not empty
            @endphp
            <ul class="nav nav-tabs" id="bookingTabs" role="tablist">
                @foreach ($packages as $package)
                    <li class="nav-item col">
                        <a class="nav-link {{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) || ($loop->first && !old('active_tab')) ? 'active' : '' }}"
                            id="{{ strtolower(str_replace(' ', '_', $package->name)) }}Tab" data-toggle="tab"
                            href="#{{ strtolower(str_replace(' ', '_', $package->name)) }}Form" role="tab"
                            aria-controls="{{ strtolower(str_replace(' ', '_', $package->name)) }}Form"
                            aria-selected="{{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) || ($loop->first && !old('active_tab')) ? 'true' : 'false' }}">
                            {{ $package->name }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content">
                @foreach ($packages as $package)
                    <div class="tab-pane fade {{ $transformedActiveTab === strtolower(str_replace(' ', '_', $package->name)) || ($loop->first && !old('active_tab')) ? 'show active' : '' }}"
                        id="{{ strtolower(str_replace(' ', '_', $package->name)) }}Form" role="tabpanel"
                        aria-labelledby="{{ strtolower(str_replace(' ', '_', $package->name)) }}Tab">
                        {!! Form::open(['route' => 'booking.submit-booking', 'method' => 'POST', 'class' => 'form booking-form']) !!}
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::text('name', null, ['placeholder' => 'Name*', 'required']) !!}
                                @error('name', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::tel('phone', null, ['placeholder' => 'Phone Number*', 'required']) !!}
                                @error('phone', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div
                                class="col-xl-{{ $package->name == 'One Way' ? '10' : '5' }} col-lg-{{ $package->name == 'One Way' ? '10' : '5' }} col-md-{{ $package->name == 'One Way' ? '' : '6' }}">
                                {!! Form::time('pick_up_time', null, ['placeholder' => 'Pick Up Time*', 'required']) !!}
                                @error('pick_up_time', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($package->name == 'Return')
                                <div class="col-xl-5 col-lg-5 col-md-6">
                                    {!! Form::time('return_time', null, ['placeholder' => 'Return Time*', 'required']) !!}
                                    @error('return_time', $package->id)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            @if ($package->name == 'Charter')
                                <div class="col-xl-5 col-lg-5 col-md-6">
                                    {!! Form::number('no_of_charter_hours', null, ['placeholder' => 'No of Charter Hours', 'required']) !!}
                                    @error('no_of_charter_hours', $package->id)
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div class="col-xl-10 col-lg-10">
                                {!! Form::date('pick_up_date', null, ['placeholder' => 'Pick Up Date*', 'required']) !!}
                                @error('pick_up_date', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                {!! Form::text('pick_up_address', null, ['placeholder' => 'Pick Up Address', 'required']) !!}
                                @error('pick_up_address', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                {!! Form::text('drop_off_address', null, ['placeholder' => 'Drop Off Address', 'required']) !!}
                                @error('drop_off_address', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::number('no_of_passenger', null, ['placeholder' => 'No of Passengers*', 'required']) !!}
                                @error('no_of_passenger', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-6">
                                {!! Form::number('no_of_wheelchair_pax', null, ['placeholder' => 'No of Wheelchair Pax*', 'required']) !!}
                                @error('no_of_wheelchair_pax', $package->id)
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {!! Form::hidden('package_id', $package->id) !!}
                            {!! Form::hidden('active_tab', $package->name) !!}

                            <div class="col-xl-10 col-lg-10 text-right">
                                {!! Form::textarea('remarks', null, ['placeholder' => 'Remarks', 'required']) !!}
                                <button class="g-recaptcha def-btn def-btn-2"
                                    data-sitekey="{{ env('GOOGLE_RECAPTCHA_SITE_KEY') }}" data-callback='onSubmit'
                                    data-action='submit'>Book Now</button>
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
    </script>
@endpush
