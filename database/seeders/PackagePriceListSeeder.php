<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use App\Models\PackagePriceList;

class PackagePriceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packageIds = Package::pluck('id')->toArray();

        $data = [
            // One way
            [
                'type' => 'less_than_10_distance',
                'description' => 'One Way Wheelchair Ride',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_than_11_distance',
                'description' => 'One Way Wheelchair Ride > 11km',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_than_16_distance',
                'description' => 'One Way Wheelchair Ride > 16km',
                'adjustment' => 50,
                'value' => 16,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_than_25_distance',
                'description' => 'One Way Wheelchair Ride > 25km',
                'adjustment' => 60,
                'value' => 25,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'urgent_booking',
                'description' => 'Urgent Booking Surcharge',
                'adjustment' => 20,
                'value' => 24,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_than_caregiver',
                'description' => 'Having > 2 Caregivers ($5 per additional caregiver)',
                'adjustment' => 5,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_than_wheelchair',
                'description' => 'Having > 1 Wheelchair ($25 per additional wheelchair)',
                'adjustment' => 25,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 7:00 - 7:30',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 7:31 - 8:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 18:00 - 20:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 20:01 - 21:00',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 7:00 - 7:30',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 7:31 - 8:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 13:00 - 18:00',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 18:01 - 20:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:01:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekday Time between 20:01 - 21:00',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sunday_or_public_holiday',
                'description' => 'Sunday or Public Holiday Time between 07:00 - 21:00',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[0],
            ],
            //Return
             [
                'type' => 'less_than_10_distance_pick_up_time',
                'description' => 'Return Wheelchair Ride (Pick Up Time)',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'less_than_10_distance_return_time',
                'description' => 'Return Wheelchair Ride (Return Time)',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_11_distance_pick_up_time',
                'description' => 'Return Wheelchair Ride > 11km (Pick Up Time)',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_11_distance_return_time',
                'description' => 'Return Wheelchair Ride > 11km (Return Time)',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_16_distance_pick_up_time',
                'description' => 'Return Wheelchair Ride > 16km (Pick Up Time)',
                'adjustment' => 50,
                'value' => 16,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_16_distance_return_time',
                'description' => 'Return Wheelchair Ride > 16km (Return Time)',
                'adjustment' => 50,
                'value' => 16,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_25_distance_pick_up_time',
                'description' => 'Return Wheelchair Ride > 25km (Pick Up Time)',
                'adjustment' => 60,
                'value' => 25,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_25_distance_return_time',
                'description' => 'Return Wheelchair Ride > 25km (Ruturn Time)',
                'adjustment' => 60,
                'value' => 25,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'urgent_booking',
                'description' => 'Urgent Booking Surcharge',
                'adjustment' => 20,
                'value' => 24,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_caregiver_pick_up_time',
                'description' => 'Having > 2 Caregivers (Pick-Up Time) ($5 per additional caregiver)',
                'adjustment' => 5,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_caregiver_return_time',
                'description' => 'Having > 2 Caregivers (Return Time) ($5 per additional caregiver)',
                'adjustment' => 5,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_wheelchair_pick_up_time',
                'description' => 'Having > 1 Wheelchair (Pick Up Time) ($25 per additional wheelchair)',
                'adjustment' => 25,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_wheelchair_return_time',
                'description' => 'Having > 1 Wheelchair (Return Time) ($25 per additional wheelchair)',
                'adjustment' => 25,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_pick_up_time',
                'description' => 'Weekday Time between 7:00 - 7:30 (Pick Up Time)',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_return_time',
                'description' => 'Weekday Time between 7:00 - 7:30 (Return Time)',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_pick_up_time',
                'description' => 'Weekday Time between 7:31 - 8:00 (Pick Up Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_return_time',
                'description' => 'Weekday Time between 7:31 - 8:00 (Return Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_pick_up_time',
                'description' => 'Weekday Time between 18:00 - 20:00 (Pick Up Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_return_time',
                'description' => 'Weekday Time between 18:00 - 20:00 (Return Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_pick_up_time',
                'description' => 'Weekday Time between 20:01 - 21:00 (Pick Up Time)',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'between_time_return_time',
                'description' => 'Weekday Time between 20:01 - 21:00 (Return Time)',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_pick_up_time',
                'description' => 'Weekend Time between 7:00 - 7:30 (Pick Up Time)',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_return_time',
                'description' => 'Weekend Time between 7:00 - 7:30 (Return Time)',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_pick_up_time',
                'description' => 'Weekend Time between 7:31 - 8:00 (Pick Up Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_return_time',
                'description' => 'Weekend Time between 7:31 - 8:00 (Return Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_pick_up_time',
                'description' => 'Weekend Time between 13:00 - 18:00 (Pick Up Time)',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_return_time',
                'description' => 'Weekend Time between 13:00 - 18:00 (Return Time)',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_pick_up_time',
                'description' => 'Weekend Time between 18:01 - 20:00 (Pick Up Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:01:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_return_time',
                'description' => 'Weekend Time between 18:01 - 20:00 (Return Time)',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:01:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_pick_up_time',
                'description' => 'Weekday Time between 20:01 - 21:00 (Pick Up Time)',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sat_between_time_return_time',
                'description' => 'Weekday Time between 20:01 - 21:00 (Return Time)',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sunday_or_public_holiday_pick_up_time',
                'description' => 'Sunday or Public Holiday Time between 07:00 - 21:00 (Pick Up Time)',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sunday_or_public_holiday_return_time',
                'description' => 'Sunday or Public Holiday Time between 07:00 - 21:00 (Return Time)',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'min_medical_escort',
                'description' => 'Medical Escort > 3 hours ($40 per additional hour)',
                'adjustment' => 40,
                'value' => 3,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            //Charter
            [
                'type' => 'greater_than_11_distance',
                'description' => 'Charter Wheelchair Ride > 11km',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_than_16_distance',
                'description' => 'Charter Wheelchair Ride > 16km',
                'adjustment' => 50,
                'value' => 16,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_than_25_distance',
                'description' => 'Charter Wheelchair Ride > 25km',
                'adjustment' => 60,
                'value' => 25,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'urgent_booking',
                'description' => 'Urgent Booking Surcharge',
                'adjustment' => 20,
                'value' => 24,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_than_caregiver',
                'description' => 'Having > 2 Caregivers ($5 per additional caregiver)' ,
                'adjustment' => 5,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_than_wheelchair',
                'description' => 'Having > 1 Wheelchair ($25 per additional wheelchair)',
                'adjustment' => 25,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 7:00 - 7:30',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 7:31 - 8:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 18:00 - 20:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:00:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'between_time',
                'description' => 'Weekday Time between 20:01 - 21:00',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 7:00 - 7:30',
                'adjustment' => 30,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 7:31 - 8:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 13:00 - 18:00',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekend Time between 18:01 - 20:00',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:01:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'sat_between_time',
                'description' => 'Weekday Time between 20:01 - 21:00',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '20:01:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'sunday_or_public_holiday',
                'description' => 'Sunday or Public Holiday Time between 07:00 - 21:00',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '21:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'min_medical_escort',
                'description' => 'Medical Escort > 3 hours ($40 per additional hour)',
                'adjustment' => 40,
                'value' => 3,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'min_charter_hour',
                'description' => 'Charter Hour > 3 hours',
                'adjustment' => 55,
                'value' => 3,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
        ];

        foreach ($data as $record) {
            PackagePriceList::create($record);
        }
    }
}
