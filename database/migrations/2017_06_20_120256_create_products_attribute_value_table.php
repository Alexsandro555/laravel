<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsAttributeValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_attribute_value', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('product_id')->length(11)->unsigned();
            $table->integer('attribute_id')->length(11)->unsigned();
            $table->string('value', 255);
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('products_attribute')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products_attribute_value', function (Blueprint $table) {
            $table->dropForeign('products_attribute_value_product_id_foreign');
            $table->dropForeign('products_attribute_value_attribute_id_foreign');
        });
        Schema::dropIfExists('products_attribute_value');
    }
}
