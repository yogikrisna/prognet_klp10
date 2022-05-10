<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Province;
use App\Models\City;
use Kavist\RajaOngkir\RajaOngkir;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $rajaongkir=new RajaOngkir('f98d71e7274a92d6e675e60efff56d59');
        $daftarProvinsi = $rajaongkir->provinsi()->all();
        foreach ($daftarProvinsi as $provinsi) {
            Province::create([
                'province_id' => $provinsi['province_id'],
                'tittle' => $provinsi['province']
            ]);
            $daftarKota =$rajaongkir->kota()->dariProvinsi($provinsi['province_id'])->get();
            foreach ($daftarKota as $kota) {
                City::create([
                    'province_id' => $provinsi['province_id'],
                    'city_id' => $kota['city_id'],
                    'tittle' => $kota['city_name']
                ]);
            }
        }
    }
}
