<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\PublicHoliday;
use App\Models\PackagePriceList;
use App\Models\BookingAdjustment;

class BookingPriceCalculation
{
    public function calculatePrice($package_id, $booking)
    {
        $totalPrice = 0;

        $packagePriceList = PackagePriceList::where('package_id', $package_id)->get();
        $bookingDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
        $weekday = $bookingDateTime->isWeekday();
        $isSaturday = $bookingDateTime->isSaturday();
        $isSundayOrPublicHoliday = $bookingDateTime->dayOfWeek === Carbon::SUNDAY || $this->isPublicHoliday($booking['pick_up_date']);

        foreach ($packagePriceList as $priceListItem) {
            if ($priceListItem->adjustment_type === 'price') {
                $value = 0;
                $caseTotal = 0;

                switch ($priceListItem->type) {
                    case 'less_than_10_distance':
                    case 'less_than_15_distance':
                    case 'less_than_24_distance':

                        $caseTotal = $booking['distance'] <= $priceListItem->value ? $priceListItem->adjustment : 0;
                        $totalPrice += $caseTotal;
                        $value = $booking['distance'];
                        break;

                    case 'greater_than_25_distance':
                        $caseTotal = $booking['distance'] >= $priceListItem->value ? $priceListItem->adjustment : 0;
                        $totalPrice += $caseTotal;
                        $value = $booking['distance'];
                        break;

                    case 'urgent_booking':
                        $pickupDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
                        $timeDifferenceInHours = Carbon::now()->diffInHours($pickupDateTime);
                        $caseTotal = $timeDifferenceInHours < $priceListItem->value ? $priceListItem->adjustment : 0;
                        $totalPrice += $caseTotal;
                        $value =  $timeDifferenceInHours;
                        break;

                    case 'greater_than_caregiver':
                        $excessCaregivers = max(0, $booking['no_of_passenger'] - $priceListItem->value);
                        $caseTotal = $excessCaregivers * $priceListItem->adjustment;
                        $totalPrice += $caseTotal;
                        $value = $booking['no_of_passenger'];
                        break;

                    case 'greater_than_wheelchair':
                        $excessWheelchairPax = max(0, $booking['no_of_wheelchair_pax'] - $priceListItem->value);
                        $caseTotal = $excessWheelchairPax * $priceListItem->adjustment;
                        $totalPrice += $caseTotal;
                        $value = $booking['no_of_wheelchair_pax'];
                        break;

                    case 'weekday_7am_730am':
                    case 'weekday_731am_8am':
                    case 'weekday_630pm_8pm':
                        if (!$isSundayOrPublicHoliday && $weekday && $bookingDateTime->between(
                            Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                            Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->end_time)
                        )) {
                            $caseTotal = $priceListItem->adjustment;
                            $totalPrice +=  $caseTotal;
                        }
                        break;

                    case 'weekend_1pm_6pm':
                    case 'weekend_601pm_8pm':
                        if (!$isSundayOrPublicHoliday && $isSaturday && $bookingDateTime->between(
                            Carbon::parse($booking['pick_up_date'] . ' ' . $priceListItem->start_time),
                            Carbon::parse($booking['pick_up_date'] . ' ' .  $priceListItem->end_time)
                        )) {
                            $caseTotal = $priceListItem->adjustment;
                            $totalPrice +=  $caseTotal;
                        }
                        break;

                    case 'sunday_or_public_holiday':
                        if ($isSundayOrPublicHoliday) {
                            $caseTotal = $priceListItem->adjustment;
                            $totalPrice +=  $caseTotal;
                        }
                        break;

                    case 'charter_hourly':
                        $charterHours = max(0, $booking['no_of_charter_hours'] - $priceListItem->value);
                        $caseTotal = $charterHours * $priceListItem->adjustment;
                        $totalPrice += $caseTotal;
                        $value = $booking['no_of_charter_hours'];
                        break;

                    case 'medical_escort':
                        if ($booking['package_name'] === "Return") {
                            $pickUpDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['pick_up_time']);
                            $returnDateTime = Carbon::parse($booking['pick_up_date'] . ' ' . $booking['return_time']);
                        } else {
                            $charterHours = $booking['no_of_charter_hours'];
                        }
                        if (isset($charterHours)) {
                            $effectiveDuration = $charterHours;
                        } else {
                            $effectiveDuration = $returnDateTime->diffInHours($pickUpDateTime);
                        }

                        if ($effectiveDuration >= $priceListItem->value) {
                            $caseTotal = $effectiveDuration * $priceListItem->adjustment;
                            $totalPrice += $caseTotal;
                            $value = $effectiveDuration;
                        }

                    default:
                        //Default
                        break;
                }

                //* Create Booking Adjustment
                BookingAdjustment::create([
                    'type' => $priceListItem->type,
                    'adjustment' => $priceListItem->adjustment,
                    'value' => $value, //Comparison Value
                    'adjustment_type' => $priceListItem->adjustment_type,
                    'total' => $caseTotal,
                    'package_id' => $package_id,
                    'booking_id' => $booking->id,
                ]);
            }
        }

        $booking->total_price = $totalPrice;
        $booking->save();

        return $totalPrice;
    }

    protected function isPublicHoliday($date)
    {
        return PublicHoliday::whereDate('date', $date)->exists();
    }
}
