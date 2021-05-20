<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = config('template.menu');
        foreach ($menus as $menu) {
            if (isset($menu['subMenu'])) {
                foreach ($menu['subMenu'] as $subMenu) {
                    $existSubMenu = Permission::where("name",$subMenu['modulCode'])->get()->first();
                    if (!$existSubMenu) {
                        Permission::create(
                            [
                                'name' => $subMenu['modulCode']
                            ]
                        );
                    }
                    
                }
            }

            $existMenu = Permission::where("name",$menu['modulCode'])->get()->first();
            if(!$existMenu){
                Permission::create(
                    [
                        'name' => $menu['modulCode']
                    ]
                );
            }
        }
    }
}
