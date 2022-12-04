<?php

namespace Database\Seeders;

use App\Models\CourseDays;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseDays::insert(
            [
                [
                    'days' => 'Mon/Wed'
                ],
                [
                    'days' => 'Sun/Tue/Thurs'
                ],

            ]
        );
    }
}
