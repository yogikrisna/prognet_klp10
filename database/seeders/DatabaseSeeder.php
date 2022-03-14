<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        'name'	=> 'yogix',
        'username'	=> 'yogilasih',
        'password'	=> bcrypt('12345678'),
        'phone' => '0816236131'
        ]);
    }
}
