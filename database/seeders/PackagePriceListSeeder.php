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
            [
                'type' => 'less_then_distance',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'less_then_distance',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'less_then_distance',
                'adjustment' => 40,
                'value' => 10,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_then_distance',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_then_distance',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_then_distance',
                'adjustment' => 45,
                'value' => 11,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'min_hourly',
                'adjustment' => 55,
                'value' => 1,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'min_hourly',
                'adjustment' => 0,
                'value' => 3,
                'adjustment_type' => 'alert',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'urgent_booking',
                'adjustment' => 20,
                'value' => 0,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'urgent_booking',
                'adjustment' => 0,
                'value' => 24,
                'adjustment_type' => 'alert',
                'package_id' => $packageIds[0],
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
                'adjustment' => 0,
                'value' => 24,
                'adjustment_type' => 'alert',
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
                'type' => 'urgent_booking',
                'adjustment' => 0,
                'value' => 24,
                'adjustment_type' => 'alert',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_then_caregiver',
                'adjustment' => 10,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_then_caregiver',
                'adjustment' => 10,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_then_caregiver',
                'adjustment' => 10,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
            [
                'type' => 'greater_then_wheelchair',
                'adjustment' => 25,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[0],
            ],
            [
                'type' => 'greater_then_wheelchair',
                'adjustment' => 25,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[1],
            ],
            [
                'type' => 'greater_then_wheelchair',
                'adjustment' => 25,
                'value' => 2,
                'adjustment_type' => 'price',
                'package_id' => $packageIds[2],
            ],
        ];

        foreach ($data as $record) {
            PackagePriceList::create($record);
        }
    }
}
