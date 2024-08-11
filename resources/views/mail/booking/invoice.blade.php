<!DOCTYPE html>
<html xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" lang="en">
    <body style="font-family: Arial Unicode MS, Helvetica, Sans-Serif;">
        <table style="table-layout: fixed; width: 100%;">
            <tbody>
                <tr>
                    <td class="">
                        <div>
                            <img src="{{ public_path('assets/images/footer-logo.png') }}" alt="bodhiwheeler-logo">
                        </div>
                    </td>
                    <td width="15%">
                        
                    </td>
                    <td>    
                        <table class="tbl-padded">
                            <caption style="text-transform: uppercase; text-align: left; font-size: 30pt;">
                                <strong>
                                    Invoice
                                </strong>
                            </caption> 
                            <tbody>
                                <tr>
                                    <td style="padding:5px;">
                                        <strong>Date</strong>                            
                                    </td>
                                    <td style="padding:5px;">
                                        {{ $data['created_at'] }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        
        <div style="padding-top: 2cm; padding-bottom: 1cm;">
            <table style="table-layout: fixed; width: 100%;">
                <tbody>
                    <tr>
                        <td>
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">From</strong>
                            </div>
                            <div>
                                Bodhiwheeler <br>
                                26, Newton Road #23-09<br>
                                Singapore - 307957<br>
                            </div>
                        </td>
                        <td width="15%">
                            
                        </td>
                        <td>
                            <div style="padding-bottom: 10px;">
                                <strong style="text-transform: uppercase;">Bill To</strong>
                            </div>
                            <div>
                                {{ $data['name'] }}<br>
                                {{ $data['phone'] }}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
       
        <div>
            <table style="table-layout: fixed; width: 100%;">
                <thead>
                    <tr class="item">
                        <th width="60%" align="left" style="border-top: 1px solid #eee; padding: 5px;">
                            Type
                        </th>
                        <th width="40%" align="center" style="border-top: 1px solid #eee; padding: 5px;">
                            Cost
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalCost = 0;
                    @endphp
                    @foreach ($data['bookingAdjustments'] as $adjustment)
                        <tr>
                            <td class="table-content" style="border-top: 1px solid #eee; padding: 5px;">{{ $adjustment['description'] }}</td>
                            <td class="table-content" style="border-top: 1px solid #eee; padding: 5px;" align="center">${{ $adjustment['total'] }}</td>
                        </tr>
                    @endforeach
                    <tr class="total">
                        <th align="right" style="border-top: 2px solid #eee; padding: 8px;">
                            <span style="font-size: 16pt;">Total Amount</span>
                        </th>
                        <th align="right" style="border-top: 2px solid #eee; padding: 8px;">
                            <strong style="font-size: 16pt;">${{ number_format($data['total_price'], 2) }}</strong>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div style="text-align: center; padding-top: 2cm; padding-bottom: 1cm;">
            @if ($systemConfig->is_active)
                @php
                    $qrImagePath = $systemConfig->image_path ? public_path('/storage/' . $systemConfig->image_path) : public_path('assets/images/payment-qr.jpg');
                @endphp
                <img src="{{ $qrImagePath }}" alt="Payment QR Code" class="mb-4" width="200" height="200">
                <h6>Payment is required to finalize your booking.</h6>
                <h6>Confirm your reservation and enjoy your ride with confidence.</h6>
            @endif
        </div>

    </body>
</html>
