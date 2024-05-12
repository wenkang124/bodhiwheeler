<!DOCTYPE html>
<html lang="en">

@php
    $bookingId = $data['id'];
    $name = $data['name'];
    $phone = $data['phone'] ? ' Phone: ' . $data['phone'] : '';
    $packageName = $data['package_name'];
    $pickUpDate = $data['pick_up_date'];
    $pickUpTime = $data['pick_up_time'];
    $returnTime = $data['return_time'];
    $isEstimatedReturnTime = $data['is_estimated_return_time'];
    $noOfCharterHours = $data['no_of_charter_hours'];
    $pickUpAddress = $data['pick_up_address'];
    $dropOffAddress = $data['drop_off_address'];
    $distance = $data['distance'];
    $noOfPassenger = $data['no_of_passenger'];
    $noOfWheelchairPax = $data['no_of_wheelchair_pax'];
    $medical_escort = $data['medical_escort'];
    $remarks = $data['remarks'];
    $total_price = $data['total_price'] * ($data['package_name'] === 'Return' ? 2 : 1);
@endphp

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $name }} - Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 50%;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            background-color: #201947;
        }

        .logo {
            display: block;
            margin: 0 auto;
            margin-bottom: 20px;
            max-width: 100%;
        }

        h4,
        span {
            display: inline-block;
            margin: 5px;
            color: white;
        }

        h3,
        h4,
        span,
        li {
            color: white;
        }

        .details {
            margin-left: 20px;
        }

        .table-content {
            border: 1px solid white;
            padding: 8px;
            color: white;
        }

        .additional-detail {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="card">
        <img src="{{ asset('assets/images/footer-logo.png') }}" alt="Company Logo" class="logo" width="200">
        <h3>New Booking</h3>
        <div>
            <h4>Booking ID: </h4><span>{{ $bookingId }}</span>
        </div>
        <div>
            <h4>Customer Name: </h4><span>{{ $name }}</span>
        </div>
        <div>
            <h4>Customer Phone: </h4><span>{{ $phone }}</span>
        </div>

        <div>
            <h4>Package Name:</h4><span>{{ $packageName }}</span>
        </div>
        <div class="additional-detail">
            <h4>Additional Booking Details:</h4>
        </div>

        <ul>
            <li>
                <h4>Pick Up Date: </h4><span>{{ $pickUpDate }} at {{ $pickUpTime }}</span>
            </li>
            <li>
                <h4>Return Time: </h4>
                <span>{{ $isEstimatedReturnTime ? 'Customer will whatsapp once ready to return' : $returnTime }}</span>
            </li>
            <li>
                <h4>No. of Charter Hours: </h4><span>{{ $noOfCharterHours }}</span>
            </li>
            <li>
                <h4>Pick Up Address: </h4><span>{{ $pickUpAddress }}</span>
            </li>
            <li>
                <h4>Drop Off Address: </h4><span>{{ $pickUpAddress }}</span>
            </li>
            <li>
                <h4>Distance: </h4><span>{{ $distance }}</span>
            </li>
            <li>
                <h4>No. of Passengers: </h4><span>{{ $noOfPassenger }}</span>
            </li>
            <li>
                <h4>No. of Wheelchair Pax: </h4><span>{{ $noOfWheelchairPax }}</span>
            </li>
            <li>
                <h4>Remarks: </h4><span>{{ $remarks }}</span>
            </li>
            <li>
                <h4>Total Price: </h4><span>${{ number_format($total_price, 2) }}</span>
                @if ($data['package_name'] === 'Return')
                    <span class="text-muted">(Includes fare for outbound and return trips)</span>
                @endif
            </li>
        </ul>

        <div style="margin-top: 20px;">
            <h4 style="margin-bottom: 10px;">Booking Price Details</h4>
            <table style="border-collapse: collapse; width: 100%;">
                <thead>
                    <tr>
                        <th class="table-content">Type</th>
                        <th class="table-content">Cost</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalCost = 0;
                    @endphp
                    @foreach ($data['bookingAdjustments'] as $adjustment)
                        @php
                            // Calculate total cost
                            $totalCost += $adjustment['total'];
                        @endphp
                        <tr>
                            <td class="table-content">{{ $adjustment['description'] }}</td>
                            <td class="table-content">${{ $adjustment['total'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="table-content"><strong>Total</strong></td>
                        <td class="table-content"><strong>${{ number_format($totalCost, 2) }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
