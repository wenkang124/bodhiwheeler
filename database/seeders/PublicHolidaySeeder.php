<?php

namespace Database\Seeders;

use App\Models\PublicHoliday;
use Illuminate\Database\Seeder;

class PublicHolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $holidays = [
            ['name' => 'New Year’s Day', 'date' => '2025-01-01'],
            ['name' => 'Chinese New Year', 'date' => '2025-01-29'],
            ['name' => 'Chinese New Year', 'date' => '2025-01-30'],
            ['name' => 'Hari Raya Puasa', 'date' => '2025-03-31'],
            ['name' => 'Good Friday', 'date' => '2025-04-18'],
            ['name' => 'Labour Day', 'date' => '2025-05-01'],
            ['name' => 'Vesak Day', 'date' => '2025-05-12'],
            ['name' => 'Hari Raya Haji', 'date' => '2025-06-07'],
            ['name' => 'National Day', 'date' => '2025-08-09'],
            ['name' => 'Deepavali', 'date' => '2025-10-20'],
            ['name' => 'Christmas Day', 'date' => '2025-12-25'],
        ];

        foreach ($holidays as $holiday) {
            PublicHoliday::create($holiday);
        }
    }
}
