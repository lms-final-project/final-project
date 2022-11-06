<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::inset([
            [
                'name'      => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  =>  Hash::make(123456789),
                'role_id'   =>  1 //for admin
            ],
            // todo : remove ahmad
            [
                'name'      => 'ahmad',
                'email'     => 'ahmad@gmail.com',
                'password'  =>  Hash::make(123456789),
                'role_id'   =>  2 //for instructor
            ]
        ]);
    }
}
