<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('full_name');
            $table->string('marital_status');
            $table->string('job');
            $table->string('job_partner')->nullable();
            $table->date('birthday');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_customers');
    }
}
