<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class ServiceMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

     public function run()
    {
        DB::table('service_menus')->insert([
            'title'  => "Renovasi Rumah	",
            'image_path' => "img/SVG/Icon-desain.svg",
            'visible' => 1,
            'url'  => "renovasi_rumah",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('service_menus')->insert([
            'title'  => "Fix Repair",
            'image_path' => "img/SVG/Icon-renovasi.svg",
            'visible' => 1,
            'url'  => "fix_repair",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('service_menus')->insert([
            'title'  => "Bangun Rumah",
            'image_path' => "img/SVG/Icon-bangun.svg",
            'visible' => 1,
            'url'  => "bangun_rumah",
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // DB::table('service_menus')->insert([
        //     'title'  => "Modular Package",
        //    'image_path' => "img/SVG/Icon-modula-package.svg",
        //     'visible' => 1,
        //     'url'  => "package",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('service_menus')->insert([
        //     'title'  => "Smart Home",
        //     'image_path' => "img/SVG/Icon-smarthome.svg",
        //     'visible' => 1,
        //     'url'  => "smarthome",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);

        // DB::table('service_menus')->insert([
        //     'title'  => "Product",
        //     'image_path' => "img/SVG/Icon-product.svg",
        //     'visible' => 1,
        //     'url'  => "product",
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        // ]);
    }
}
