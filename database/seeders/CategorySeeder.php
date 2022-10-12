<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



      //  $icon=Category::find(1)->icon;
      //  dd($icon);
        Category::insert(

            [

                [
                    'name' => 'ui/ux',
'icon_id'=>'1'

                ],
                [
                    'name' => 'web',
                    'icon_id'=>'3'
                ],
                [
                    'name' => 'mobile',
                    'icon_id'=>'2'
                ],


            ]


        );}
    }

