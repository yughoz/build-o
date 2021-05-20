<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCancelEnumValueAtStatusTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Because DBAL not supported enum changing name, use drop column and re create field
        // Open this link for checking this issue https://github.com/laravel/framework/issues/35096
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('status', ['start','building', 'finish', 'cancel'])->default('start')->after('percentage');
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
            $table->dropColumn('status');
        });
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('status', ['start','building', 'finish'])->after('percentage');
        });
    }
}
