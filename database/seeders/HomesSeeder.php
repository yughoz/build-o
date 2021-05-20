<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class HomesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert([
            'module_code'   => "about_buildo",
            'module_name'   => "Mengapa Harus Build O",
            'title'         => "Baik Protokol COVID19",
            'img_url'       => "img/default/work.png",
            'desc'          => "Semua proses pengerjaan pembangunan dan renovasi di Build0 telah mengikuti standart protokol COVID19",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "about_buildo",
            'module_name'   => "Mengapa Harus Build O",
            'title'         => "Baik Desinnya",
            'img_url'       => "img/default/work.png",
            'desc'          => "Semua rumah di BuildO didesign denan optimasi aliran udara,pencahayan dan di rancang untuk tumbuh di masa depan",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "about_buildo",
            'module_name'   => "Mengapa Harus Build O",
            'title'         => "Baik Protokol COVID19",
            'img_url'       => "img/default/work.png",
            'desc'          => "Semua proses pengerjaan pembangunan dan renovasi di Build0 telah mengikuti standart protokol COVID19",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "about_buildo",
            'module_name'   => "Mengapa Harus Build O",
            'title'         => "Baik Desinnya",
            'img_url'       => "img/default/work.png",
            'desc'          => "Semua rumah di BuildO didesign denan optimasi aliran udara,pencahayan dan di rancang untuk tumbuh di masa depan",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "about_buildo",
            'module_name'   => "Mengapa Harus Build O",
            'title'         => "Baik Desinnya",
            'img_url'       => "img/default/work.png",
            'desc'          => "Semua rumah di BuildO didesign denan optimasi aliran udara,pencahayan dan di rancang untuk tumbuh di masa depan",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "works",
            'module_name'   => "Cara kerja Renovasi dan Bangun",
            'title'         => "Isi Form",
            'img_url'       => "img/default/user.png",
            'desc'          => "Anda mengisi form yang kami sediakan secara online",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "works",
            'module_name'   => "Cara kerja Renovasi dan Bangun",
            'title'         => "Team akan menghubungi",
            'img_url'       => "img/default/user.png",
            'desc'          => "Anda akan dihubungu oleh team BuildO terkait proyek ini",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "works",
            'module_name'   => "Cara kerja Renovasi dan Bangun",
            'title'         => "Deal proyek",
            'img_url'       => "img/default/user.png",
            'desc'          => "Anda dan kami telah sepakat terkait rencana proyek",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "works",
            'module_name'   => "Cara kerja Renovasi dan Bangun",
            'title'         => "Awasi melaui website",
            'img_url'       => "img/default/user.png",
            'desc'          => "Anda dapat emgawasi proyek yang anda peryacayakn kepada kami melalui website BuildO",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "portofolio",
            'module_name'   => "Yang telah kami kerjakan",
            'title'         => "Modern Bathroom",
            'img_url'       => "img/default/BahanBangunan.jpg",
            'desc'          => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('homes')->insert([
            'module_code'   => "portofolio",
            'module_name'   => "Yang telah kami kerjakan",
            'title'         => "Kamar terbaru",
            'img_url'       => "img/default/BahanBangunan.jpg",
            'desc'          => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "review",
            'module_name'   => "Apa kata mereka",
            'title'         => "Ahmad subekti",
            'img_url'       => "img/default/user.png",
            'desc'          => "Tinggal di rumah idaman adalah mimpi saya sejak kecil",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('homes')->insert([
            'module_code'   => "review",
            'module_name'   => "Apa kata mereka",
            'title'         => "Ahmad subekti",
            'img_url'       => "img/default/user.png",
            'desc'          => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('homes')->insert([
            'module_code'   => "review",
            'module_name'   => "Apa kata mereka",
            'title'         => "Ahmad subekti",
            'img_url'       => "img/default/user.png",
            'desc'          => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('homes')->insert([
            'module_code'   => "review",
            'module_name'   => "Apa kata mereka",
            'title'         => "Ahmad subekti",
            'img_url'       => "img/default/user.png",
            'desc'          => "Tinggal di rumah idaman adalah mimpi saya sejak kecil",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "review",
            'module_name'   => "Apa kata mereka",
            'title'         => "Ahmad subekti",
            'img_url'       => "img/default/user.png",
            'desc'          => "Tinggal di rumah idaman adalah mimpi saya sejak kecil",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "baner2",
            'module_name'   => "Renovasi rumahmu dengan harga murah",
            'title'         => "false",
            'img_url'       => "img/default/Banner.png",
            'desc'          => "false",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('homes')->insert([
            'module_code'   => "brand",
            'module_name'   => "Official brand",
            'title'         => "Cat avian",
            'img_url'       => "img/brand/avianbrandslogo.png",
            'desc'          => "false",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "brand",
            'module_name'   => "Official brand",
            'title'         => "Cat avian",
            'img_url'       => "img/brand/avianbrandslogo.png",
            'desc'          => "false",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('homes')->insert([
            'module_code'   => "brand",
            'module_name'   => "Official brand",
            'title'         => "Semen Tiga Roda",
            'img_url'       => "img/brand/tigaroda.png",
            'desc'          => "false",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('homes')->insert([
            'module_code'   => "brand",
            'module_name'   => "Official brand",
            'title'         => "Krisbow",
            'img_url'       => "img/brand/krisbow.png",
            'desc'          => "false",
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        
    }
}
