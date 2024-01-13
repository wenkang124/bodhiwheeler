<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $packageNames = ['One Way', 'Return', 'Charter'];

        foreach ($packageNames as $packageName) {
            Package::create([
                'name' => $packageName
            ]);
        }
    }
}
