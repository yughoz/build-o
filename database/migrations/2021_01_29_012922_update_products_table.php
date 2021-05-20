<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('product')) {
            Schema::rename('product', 'products');
        }
        
        Schema::table('products', function (Blueprint $table) {
            $table->string('image_path_1')->nullable()->change();
            $table->string('url_ecommerce', 255)->nullable()->after('image_path_5');
            $table->unsignedBigInteger('service_menu_id')->after('url_ecommerce');
            $table->foreign('service_menu_id')->references('id')->on('service_menus')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['service_menu_id']);
            $table->dropColumn('url_ecommerce');
            $table->dropColumn('service_menu_id');
        });
        
        if (Schema::hasTable('products')) {
            Schema::rename('products', 'product');
        }
    }
}
