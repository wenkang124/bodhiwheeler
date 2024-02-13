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
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greather_than_11_distance',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greather_than_16_distance',
                'adjustment' => 50,
                'value' => 16,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greather_than_25_distance',
                'adjustment' => 60,
                'value' => 25,
                'adjustment_type' => 'base_price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'urgent_booking',
                'adjustment' => 20,
                'value' => 24,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_than_caregiver',
                'adjustment' => 5,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_than_wheelchair',
                'adjustment' => 25,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'between_time',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'between_time',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'between_time',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:30:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sat_between_time',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sat_between_time',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:00:00',
                'end_time' => '23:00:00',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'sunday_or_public_holiday',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            //Return 
            [
                'type' => 'less_than_10_distance',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'less_than_10_distance',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'less_than_15_distance',
                'adjustment' => 45,
                'value' => 15,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'less_than_15_distance',
                'adjustment' => 45,
                'value' => 15,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'less_than_24_distance',
                'adjustment' => 50,
                'value' => 24,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'less_than_24_distance',
                'adjustment' => 50,
                'value' => 24,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_than_25_distance',
                'adjustment' => 60,
                'value' => 25,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_25_distance',
                'adjustment' => 60,
                'value' => 25,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'urgent_booking',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'urgent_booking',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_than_caregiver',
                'adjustment' => 5,
                'value' => 3,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_caregiver',
                'adjustment' => 5,
                'value' => 3,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],

            [
                'type' => 'greater_than_wheelchair',
                'adjustment' => 25,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_than_wheelchair',
                'adjustment' => 25,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],

            [
                'type' => 'weekday_7am_730am',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'weekday_7am_730am',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:00:00',
                'end_time' => '07:30:00',
                'package_id' => $packageIds[2],
            ],

            [
                'type' => 'weekday_731am_8am',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'weekday_731am_8am',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '07:31:00',
                'end_time' => '08:00:00',
                'package_id' => $packageIds[2],
            ],

            [
                'type' => 'weekday_630pm_8pm',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:30:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'weekday_630pm_8pm',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '18:30:00',
                'end_time' => '20:00:00',
                'package_id' => $packageIds[2],
            ],

            [
                'type' => 'weekend_1pm_6pm',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'weekend_1pm_6pm',
                'adjustment' => 10,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'weekend_601pm_8pm',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'start_time' => '13:00:00',
                'end_time' => '18:00:00',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'sunday_or_public_holiday',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'sunday_or_public_holiday',
                'adjustment' => 50,
                'value' => 0,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'charter_hourly',
                'adjustment' => 55,
                'value' => 3,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'medical_escort',
                'adjustment' => 40,
                'value' => 3,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'medical_escort',
                'adjustment' => 40,
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
