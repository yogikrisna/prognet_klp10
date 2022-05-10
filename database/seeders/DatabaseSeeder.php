<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LocationSeeder::class);

        // Admin::create([
        //     'admin_name' => 'Dewa Adhigamika',
        //     'username' => 'fogikkun',
        //     'password' => bcrypt('12345678'),
        //     'admin_address' => 'Kuta Bali',
        //     'phone' => '081236227037'
        // ]);

        // ProductCategories::create([
        //     'category_name' => 'Fiksi'
        // ]);

        // ProductCategories::create([
        //     'category_name' => 'Komedi'
        // ]);

        // ProductCategories::create([
        //     'category_name' => 'Horor'
        // ]);

        // ProductCategories::create([
        //     'category_name' => 'Drama'
        // ]);

        // ProductCategories::create([
        //     'category_name' => 'Medis'
        // ]);

        // ProductCategories::create([
        //     'category_name' => 'Sejarah'
        // ]);

        // Products::factory(20)->create();
    }
}
