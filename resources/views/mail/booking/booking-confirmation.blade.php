<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['name'] }} - Booking Confirmation</title>
    <style>
        .email {
            max-width: 480px;
            margin: 1rem auto;
            border-radius: 10px;
            border-top: #0D0925 2px solid;
            border-bottom: #0D0925 2px solid;
            box-shadow: 0 2px 18px rgba(0, 0, 0, 0.2);
            padding: 1.5rem;
            font-family: Arial, Helvetica, sans-serif;
        }

        .email .email-head {
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
            padding-bottom: 1rem;
        }

        .email .email-head .head-img {
            max-width: 240px;
            padding: 0 0.5rem;
            display: block;
            margin: 0 auto;
        }

        .email .email-head .head-img img {
            width: 100%;
        }

        .email-body .invoice-icon {
            max-width: 80px;
            margin: 1rem auto;
        }

        .email-body .invoice-icon img {
            width: 100%;
        }

        .email-body .body-text {
            padding: 2rem 0 1rem;
            text-align: center;
            font-size: 1.15rem;
        }

        .email-body .body-text.bottom-text {
            padding: 2rem 0 1rem;
            text-align: center;
            font-size: 0.8rem;
        }

        .email-body .body-text .body-greeting {
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .email-body .body-table {
            text-align: left;
        }

        .email-body .body-table table {
            width: 100%;
            font-size: 1.1rem;
        }

        .email-body .body-table table .total {
            background-color: hsla(4, 67%, 52%, 0.12);
            border-radius: 8px;
            color: #0D0925;
        }

        .email-body .body-table table .item {
            border-radius: 8px;
            color: #0D0925;
        }

        .email-body .body-table table th,
        .email-body .body-table table td {
            padding: 10px;
        }

        .email-body .body-table table tr:first-child th {
            border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        }

        .email-body .body-table table tr td:last-child {
            text-align: right;
        }

        .email-body .body-table table tr th:last-child {
            text-align: right;
        }

        .email-body .body-table table tr:last-child th:first-child {
            border-radius: 8px 0 0 8px;
        }

        .email-body .body-table table tr:last-child th:last-child {
            border-radius: 0 8px 8px 0;
        }

        .email-footer {
            border-top: 1px solid rgba(0, 0, 0, 0.2);
        }

        .email-footer .footer-text {
            font-size: 0.8rem;
            text-align: center;
            padding-top: 1rem;
        }

        .email-footer .footer-text a {
            color: #0D0925;
        }
    </style>
</head>

<body>
    <div class="email">
        <div class="email-head">
            <div class="head-img">
                <img src="{{ asset('assets/images/footer-logo.png') }}?v=1" alt="bodhiwheeler-logo">
            </div>
        </div>
        <div class="email-body">
            <div class="body-text">
                <div class="body-greeting">
                    Hi there!
                </div>
                A new booking has been received and confirmed. Here are the details:
            </div>
            <div class="body-table">
                <ul>
                    <li>
                        <strong>Booking ID:</strong> {{ $data['id'] }}
                    </li>
                    <li>
                        <strong>Customer Name:</strong> {{ $data['name'] }}
                    </li>
                    <li>
                        <strong>Customer Email:</strong> {{ $data['email'] ?? 'N/A' }}
                    </li>
                    <li>
                        <strong>Customer Phone:</strong> {{ $data['phone'] }}
                    </li>
                    <li>
                        <strong>Package Name:</strong> {{ $data['package_name'] }}
                    </li>
                    <li>
                        <strong>Pick Up Date and Time:</strong> {{ $data['pick_up_date'] }} at
                        {{ $data['pick_up_time'] }}
                    </li>
                    @if ($data['package_name'] == 'Return')
                        <li>
                            <strong>Return Time:</strong>
                            {{ $data['return_time'] ? $data['return_time'] : 'Customer will WhatsApp once ready to return' }}
                        </li>
                    @endif
                    @if ($data['package_name'] == 'Charter')
                        <li>
                            <strong>No. of Charter Hours:</strong> {{ $data['no_of_charter_hours'] }}
                        </li>
                    @endif
                    <li>
                        <strong>Pick Up Address:</strong> {{ $data['pick_up_address'] }}
                    </li>
                    <li>
                        <strong>Drop Off Address:</strong> {{ $data['drop_off_address'] }}
                    </li>
                    <li>
                        <strong>Distance:</strong> {{ $data['distance'] }}KM
                    </li>
                    <li>
                        <strong>No. of Passengers:</strong> {{ $data['no_of_passenger'] }}
                    </li>
                    <li>
                        <strong>No. of Wheelchair Pax:</strong> {{ $data['no_of_wheelchair_pax'] }}
                    </li>
                    <li>
                        <strong>Remarks:</strong> {{ $data['remarks'] }}
                    </li>
                    <li>
                        <strong>Total Price:</strong>
                        ${{ number_format($data['total_price'], 2) }}
                    </li>
                </ul>

                <table>
                    <tr class="item">
                        <th>Type</th>
                        <th>Cost</th>
                    </tr>
                    @php
                        $totalCost = 0;
                    @endphp
                    @foreach ($data['bookingAdjustments'] as $adjustment)
                        <tr>
                            <td class="table-content">{{ $adjustment['description'] }}</td>
                            <td class="table-content">${{ $adjustment['total'] }}</td>
                        </tr>
                    @endforeach
                    <tr class="total">
                        <th>Total</th>
                        <th>${{ number_format($data['total_price'], 2) }}</th>
                    </tr>
                </table>
            </div>
            <div class="body-text bottom-text">
                A new customer booking has been made. The details are above, and an invoice will be attached.
            </div>
        </div>
        <div class="email-footer">
            <div class="footer-text">
                &copy; <a href="{{ url('/') }}" target="_blank">bodhiwheeler.org</a>
            </div>
        </div>
    </div>
</body>

</html>
