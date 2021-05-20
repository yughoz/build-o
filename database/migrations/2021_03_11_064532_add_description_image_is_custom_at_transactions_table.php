<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionImageIsCustomAtTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->boolean('is_custom')->default(0)->comment('For checking the product design is custom or not')->after('status');
            $table->text('desc')->comment('value can be filled when is custom is true')->nullable()->after('is_custom');
            $table->string('image_path')->comment('value can be filled when is custom is true')->nullable()->after('desc');
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
            $table->dropColumn('is_custom');
            $table->dropColumn('desc');
            $table->dropColumn('image_path');
        });
    }
}
