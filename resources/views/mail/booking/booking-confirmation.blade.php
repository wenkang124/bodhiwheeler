<!DOCTYPE html>
<html lang="en">

@php
    $name = $data['name'];
    $email = $data['email'];
    $phone = $data['phone'] ? ' Phone: ' . $data['phone'] : '';
    $pickUpDate = $data['pick_up_date'];
    $pickUpTime = $data['pick_up_time'];
    $returnTime = $data['return_time'];
    $isEstimatedReturnTime = $data['is_estimated_return_time'];
    $noOfCharterHours = $data['no_of_charter_hours'];
    $pickUpAddress = $data['pick_up_address'];
    $dropOffAddress = $data['drop_off_address'];
    $noOfPassenger = $data['no_of_passenger'];
    $noOfWheelchairPax = $data['no_of_wheelchair_pax'];
    $packageName = $data['package_name'];
    $medical_escort = $data['medical_escort'];
    $remarks = $data['remarks'];
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $name }} - Booking Confirmation</title>
</head>

<body>
    <h4>Customer Name: {{ $name }}</h4>
    <h4>Customer Email: {{ $email }}</h4>
    <h4>Customer Phone: {{ $phone }}</h4>
    <h4>Package Name: {{ $packageName }}</h4>
    <h4>Additional Booking Details:</h4>
    <ul>
        <li>
            <h4>Pick Up Date: {{ $pickUpDate }}</h4>
        </li>
        <li>
            <h4>Pick Up Time: {{ $pickUpTime }}</h4>
        </li>
        <li>
            <h4>Return Time: {{ $isEstimatedReturnTime ? 'Customer will whatsapp once ready to return' : $returnTime }}
        </li>
        <li>
            <h4>No. of Charter Hours: {{ $noOfCharterHours }}</h4>
        </li>
        <li>
            <h4>Pick Up Address: {{ $pickUpAddress }}</h4>
        </li>
        <li>
            <h4>Drop Off Address: {{ $dropOffAddress }}</h4>
        </li>
        <li>
            <h4>No. of Passengers: {{ $noOfPassenger }}</h4>
        </li>
        <li>
            <h4>No. of Wheelchair Pax: {{ $noOfWheelchairPax }}</h4>
        </li>
        {{-- <@if ($packageName === 'Return' || $packageName === 'Charter')
            <li>
                <h4>Medical Escort: {{ $medical_escort == 1 ? 'True' : 'False' }}</h4>
            </li>
            @endif --}}
            <li>
                <h4>Remarks: {{ $remarks }}</h4>
            </li>
    </ul>
</body>

</html>
