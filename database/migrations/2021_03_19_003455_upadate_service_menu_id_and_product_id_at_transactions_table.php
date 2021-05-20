<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpadateServiceMenuIdAndProductIdAtTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('service_menu_id')->default(null)->nullable()->change();
            $table->unsignedBigInteger('product_id')->default(null)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('service_menu_id')->default(1)->nullable(false)->change();
            $table->unsignedBigInteger('product_id')->nullable(false)->change();
        });
    }
}
