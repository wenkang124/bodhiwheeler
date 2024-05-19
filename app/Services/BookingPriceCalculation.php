<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\PublicHoliday;
use App\Models\PackagePriceList;
use App\Models\BookingAdjustment;

class BookingPriceCalculation
{

    //rewrite
    public function calculatePrice($package_id, $booking)
    {
        $packagePriceList = PackagePriceList::where('package_id', $package_id)->get();

        switch ($booking['package_name']) {
            case 'Return':
                $this->calculateReturnPackagePrice($packagePriceList, $booking);
                break;
            case 'Charter':
                $this->calculateCharterPackagePrice($packagePriceList, $booking);
                break;
            default:
                $this->calculateOneWayPackagePrice($packagePriceList, $booking);
                break;
        }

        $booking->total_price = $booking->bookingAdjustments->sum('total');
        $booking->save();
    }

    public function calculateReturnPackagePrice($packagePriceList, $booking)
    {
        $bookingDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
        $bookingReturnTime = isset($booking['return_time']) ? Carbon::parse($booking['pick_up_date'] . ' ' . $booking['return_time']) : null;
        $weekday = $bookingDateTime->isWeekday();
        $isSundayOrPublicHoliday = $bookingDateTime->dayOfWeek === Carbon::SUNDAY || $this->isPublicHoliday($booking['pick_up_date']);
        $isSaturday = $bookingDateTime->isSaturday();


        foreach ($packagePriceList as $priceListItem) {
            switch ($priceListItem->type) {
                case 'less_than_10_distance_pick_up_time':
                case 'less_than_10_distance_return_time':

                    $caseTotal = $booking['distance'] <= $priceListItem->value ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'greater_than_11_distance_pick_up_time':
                case 'greater_than_11_distance_return_time':
                    $caseTotal = ($booking['distance'] >= $priceListItem->value && $booking['distance'] < 16) ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'greater_than_16_distance_pick_up_time':
                case 'greater_than_16_distance_return_time':
                    $caseTotal = ($booking['distance'] >= $priceListItem->value && $booking['distance'] < 25) ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'greater_than_25_distance_pick_up_time':
                case 'greater_than_25_distance_return_time':
                    $caseTotal = $booking['distance'] >= $priceListItem->value ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'urgent_booking':
                    $pickupDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
                    $timeDifferenceInHours = Carbon::now()->diffInHours($pickupDateTime);
                    $caseTotal = $timeDifferenceInHours < $priceListItem->value ? $priceListItem->adjustment : 0;

                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' =>  $timeDifferenceInHours, //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'greater_than_caregiver':
                    $caregivers = $booking['no_of_passenger'] - $priceListItem->value;

                    if ($caregivers > 0) {
                        $caseTotal = $caregivers * $priceListItem->adjustment;

                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' => $caregivers, //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }

                    break;

                case 'greater_than_wheelchair':
                    $excessWheelchairPax = max(0, $booking['no_of_wheelchair_pax'] - $priceListItem->value);

                    if ($excessWheelchairPax > 0) {
                        $caseTotal = $excessWheelchairPax * $priceListItem->adjustment;

                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' => $excessWheelchairPax, //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }
                    break;

                case 'between_time_pick_up_time':
                    if (!$isSundayOrPublicHoliday && $weekday && $bookingDateTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        $caseTotal = $priceListItem->adjustment;

                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'between_time_return_time':
                    if ($bookingReturnTime !== null && !$isSundayOrPublicHoliday && $weekday && $bookingReturnTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        $caseTotal = $priceListItem->adjustment;

                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sat_between_time_pick_up_time':
                    if (!$isSundayOrPublicHoliday && $isSaturday && $bookingDateTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        $caseTotal = $priceListItem->adjustment;

                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sat_between_time_return_time':
                    if ($bookingReturnTime !== null && !$isSundayOrPublicHoliday && $isSaturday && $bookingDateTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        $caseTotal = $priceListItem->adjustment;

                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sunday_or_public_holiday_pick_up_time':
                    if ($isSundayOrPublicHoliday) {
                        $caseTotal = $priceListItem->adjustment;

                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sunday_or_public_holiday_return_time':
                    if ($bookingReturnTime !== null && $isSundayOrPublicHoliday) {
                        $caseTotal = $priceListItem->adjustment;

                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'min_medical_escort':
                    $pickUpDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
                    $returnDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['return_time']);
                    $effectiveDuration = $returnDateTime->diffInHours($pickUpDateTime);

                    if ($booking->medical_escort && $effectiveDuration >= $priceListItem->value) {
                        $caseTotal = $effectiveDuration * $priceListItem->adjustment;
                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' => $effectiveDuration, //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }
                default:
                    //Default
                    break;
            }
        }
    }

    public function calculateCharterPackagePrice($packagePriceList, $booking)
    {
        $bookingDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
        $weekday = $bookingDateTime->isWeekday();
        $isSundayOrPublicHoliday = $bookingDateTime->dayOfWeek === Carbon::SUNDAY || $this->isPublicHoliday($booking['pick_up_date']);
        $isSaturday = $bookingDateTime->isSaturday();


        foreach ($packagePriceList as $priceListItem) {
            switch ($priceListItem->type) {
                case 'less_than_10_distance':

                    $caseTotal = $booking['distance'] <= $priceListItem->value ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'greater_than_11_distance':
                    $caseTotal = ($booking['distance'] >= $priceListItem->value && $booking['distance'] < 16) ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'greater_than_16_distance':
                    $caseTotal = ($booking['distance'] >= $priceListItem->value && $booking['distance'] < 25) ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'greater_than_25_distance':
                    $caseTotal = $booking['distance'] >= $priceListItem->value ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'urgent_booking':
                    $pickupDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
                    $timeDifferenceInHours = Carbon::now()->diffInHours($pickupDateTime);
                    $caseTotal = $timeDifferenceInHours < $priceListItem->value ? $priceListItem->adjustment : 0;

                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' =>  $timeDifferenceInHours, //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'greater_than_caregiver':
                    $caregivers = $booking['no_of_passenger'] - $priceListItem->value;

                    if ($caregivers > 0) {
                        $caseTotal = $caregivers * $priceListItem->adjustment;

                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' => $caregivers, //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }

                    break;

                case 'greater_than_wheelchair':
                    $excessWheelchairPax = max(0, $booking['no_of_wheelchair_pax'] - $priceListItem->value);

                    if ($excessWheelchairPax > 0) {
                        $caseTotal = $excessWheelchairPax * $priceListItem->adjustment;

                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' =>  $excessWheelchairPax, //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }
                    break;

                case 'between_time':
                    if (!$isSundayOrPublicHoliday && $weekday && $bookingDateTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $priceListItem->adjustment,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sat_between_time':
                    if (!$isSundayOrPublicHoliday && $isSaturday && $bookingDateTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $priceListItem->adjustment,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sunday_or_public_holiday':
                    if ($isSundayOrPublicHoliday) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $priceListItem->adjustment,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'min_charter_hour':
                case 'min_medical_escort':
                    if ($booking->medical_escort && $booking['no_of_charter_hours'] >= $priceListItem->value) {
                        $caseTotal = $booking['no_of_charter_hours'] * $priceListItem->adjustment;
                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' => $booking['no_of_charter_hours'], //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }
                    break;
                default:
                    //Default
                    break;
            }
        }
    }

    public function calculateOneWayPackagePrice($packagePriceList, $booking)
    {
        $bookingDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
        $weekday = $bookingDateTime->isWeekday();
        $isSundayOrPublicHoliday = $bookingDateTime->dayOfWeek === Carbon::SUNDAY || $this->isPublicHoliday($booking['pick_up_date']);
        $isSaturday = $bookingDateTime->isSaturday();


        foreach ($packagePriceList as $priceListItem) {
            switch ($priceListItem->type) {
                case 'less_than_10_distance':

                    $caseTotal = $booking['distance'] <= $priceListItem->value ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'greater_than_11_distance':
                    $caseTotal = ($booking['distance'] >= $priceListItem->value && $booking['distance'] < 16) ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'greater_than_16_distance':
                    $caseTotal = ($booking['distance'] >= $priceListItem->value && $booking['distance'] < 25) ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'greater_than_25_distance':
                    $caseTotal = $booking['distance'] >= $priceListItem->value ? $priceListItem->adjustment : 0;
                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => $booking['distance'], //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'urgent_booking':
                    $pickupDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
                    $timeDifferenceInHours = Carbon::now()->diffInHours($pickupDateTime);
                    $caseTotal = $timeDifferenceInHours < $priceListItem->value ? $priceListItem->adjustment : 0;

                    if ($caseTotal > 0) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' =>  $timeDifferenceInHours, //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $caseTotal,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;

                case 'greater_than_caregiver':
                    $caregivers = $booking['no_of_passenger'] - $priceListItem->value;

                    if ($caregivers > 0) {
                        $caseTotal = $caregivers * $priceListItem->adjustment;

                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' => $caregivers, //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }

                    break;

                case 'greater_than_wheelchair':
                    $excessWheelchairPax = max(0, $booking['no_of_wheelchair_pax'] - $priceListItem->value);

                    if ($excessWheelchairPax > 0) {
                        $caseTotal = $excessWheelchairPax * $priceListItem->adjustment;

                        if ($caseTotal > 0) {
                            BookingAdjustment::create([
                                'type' => $priceListItem->type,
                                'description' => $priceListItem->description,
                                'adjustment' => $priceListItem->adjustment,
                                'value' => $excessWheelchairPax, //Comparison Value
                                'adjustment_type' => $priceListItem->adjustment_type,
                                'total' => $caseTotal,
                                'package_id' => $booking->package_id,
                                'booking_id' => $booking->id,
                            ]);
                        }
                    }
                    break;

                case 'between_time':
                    if (!$isSundayOrPublicHoliday && $weekday && $bookingDateTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $priceListItem->adjustment,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sat_between_time':
                    if (!$isSundayOrPublicHoliday && $isSaturday && $bookingDateTime->between(
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                        Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                    )) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $priceListItem->adjustment,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                case 'sunday_or_public_holiday':
                    if ($isSundayOrPublicHoliday) {
                        BookingAdjustment::create([
                            'type' => $priceListItem->type,
                            'description' => $priceListItem->description,
                            'adjustment' => $priceListItem->adjustment,
                            'value' => Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time)->toDateTimeString(), //Comparison Value
                            'adjustment_type' => $priceListItem->adjustment_type,
                            'total' => $priceListItem->adjustment,
                            'package_id' => $booking->package_id,
                            'booking_id' => $booking->id,
                        ]);
                    }
                    break;
                default:
                    //Default
                    break;
            }
        }
    }

    protected function isPublicHoliday($date)
    {
        return PublicHoliday::whereDate('date', $date)->exists();
    }
}
