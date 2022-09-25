<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'first_name' => 'Tarikul',
            'last_name'  => 'Islam',
            'slug'       => 'tarikul-islam',
            'email'      => 'tarikul@test.com',
        ]);

        User::factory()->create([
            'first_name' => 'Monir',
            'last_name'  => 'Hossain',
            'slug'       => 'monir-hossaiin',
            'email'      => 'monir@test.com',
        ]);
        User::factory()->create([
            'first_name' => 'Asia',
            'last_name'  => 'Akter',
            'slug'       => 'asia-akter',
            'email'      => 'asia@test.com',
        ],);
    }
}
