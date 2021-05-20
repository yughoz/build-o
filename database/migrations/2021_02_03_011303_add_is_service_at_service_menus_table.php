<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsServiceAtServiceMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_menus', function (Blueprint $table) {
            $table->boolean('is_service')->default(1)->comment('Membedakan mana layanan mana product yang bisa dibeli')->after('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_menus', function (Blueprint $table) {
            $table->dropColumn('is_service');
        });
    }
}
