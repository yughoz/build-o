<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $service_menus = DB::table('service_menus')->get();

        foreach ($service_menus as $key => $service_menu) {
            for ($i = 1; $i < 6; $i++) { 
                DB::table('categories')->insert([
                    'service_menu_id' => $service_menu->id,
                    'name'  => "Kategori ".$i,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }

    }
}
