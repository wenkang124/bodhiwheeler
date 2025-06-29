<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\AdminRoleSeeder;
use Database\Seeders\PackageSeeder;
use Database\Seeders\SystemConfigSeeder;
use Database\Seeders\PublicHolidaySeeder;
use Database\Seeders\PackagePriceListSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([
            PackageSeeder::class,
            AdminRoleSeeder::class,
            AdminSeeder::class,
            PublicHolidaySeeder::class,
            PackagePriceListSeeder::class,
            SystemConfigSeeder::class,
        ]);
    }
}
