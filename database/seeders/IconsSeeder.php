<?php

namespace Database\Seeders;

use App\Models\Icon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IconsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $icons = [
            [
                'name' => 'ui/ux',
                'class' => 'ri-layout-fill'
            ],
            [
                'name' => 'mobile',
                'class' => 'ri-smartphone-fill'
            ],
            [
                'name' => 'web',
                'class' => 'ri-window-fill'
            ],
        ];

        foreach ($icons as $icon ) {
            Icon::create([
                'name' => $icon['name'],
                'class' => $icon['class'],
            ]);
        }
    }
    }

