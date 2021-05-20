<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMaxChildAtHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->smallInteger('max_child')->default(1)->comment('Membatasi child dari setiap module_code')->after('desc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homes', function (Blueprint $table) {
            $table->dropColumn('max_child');
        });
    }
}
