<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .email {
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
        }

        .email-head {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .head-img img {
            max-width: 200px;
        }

        .email-body {
            padding: 20px;
        }

        .body-greeting {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .body-text {
            margin-bottom: 20px;
        }

        .body-table {
            margin: 20px 0;
        }

        .body-table ul {
            list-style-type: none;
            padding: 0;
        }

        .body-table li {
            padding: 5px 0;
        }

        .action-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 20px 0;
        }

        .bottom-text {
            margin-top: 30px;
            font-style: italic;
        }

        .email-footer {
            background-color: #f8f9fa;
            padding: 15px;
            text-align: center;
            border-top: 1px solid #ddd;
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
                    Hi {{ $booking->name }},
                </div>
                <p>We noticed that you have a pending booking with BodhiWheeler. Your booking details are as follows:</p>
            </div>
            <div class="body-table">
                <ul>
                    <li>
                        <strong>Booking ID:</strong> {{ $booking->id }}
                    </li>
                    <li>
                        <strong>Email:</strong> {{ $booking->email ?? 'N/A' }}
                    </li>
                    <li>
                        <strong>Package:</strong> {{ $booking->package_name }}
                    </li>
                    <li>
                        <strong>Pick Up Date and Time:</strong> {{ $booking->pick_up_date }} at
                        {{ $booking->pick_up_time }}
                    </li>
                    <li>
                        <strong>Pick Up Address:</strong> {{ $booking->pick_up_address }}
                    </li>
                    <li>
                        <strong>Drop Off Address:</strong> {{ $booking->drop_off_address }}
                    </li>
                </ul>
            </div>
            <div class="body-text">
                <p>To complete your booking, please click the button below:</p>
                <a href="{{ route('booking.confirmation', ['booking_id' => $booking->id]) }}" class="action-button">Complete Your Booking</a>
                <p>If you have any questions or need assistance, please don't hesitate to contact us via WhatsApp at <a href="https://wa.me/6593682784?text=Hi%20there!%20I'm%20interested%20in%20your%20services.%20Can%20you%20provide%20more%20information%20about%20booking%20a%20ride?" target="_blank">+65 93682784</a>.</p>
                <p class="bottom-text">
                    Thank you for choosing BodhiWheeler for your transportation needs.
                </p>
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
