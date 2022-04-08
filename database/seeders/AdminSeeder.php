<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'admin_name' => 'Dewa Adhigamika',
            'username' => 'fogikkun',
            'password' => bcrypt('12345678'),
            'admin_address' => 'Kuta Bali',
            'phone' => '081236227037'
        ]);
    }
}
