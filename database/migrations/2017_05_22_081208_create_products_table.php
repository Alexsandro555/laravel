<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->string('url_key', 255)->unique();
            $table->decimal('price',10,2);
            $table->text('description');
            $table->integer('qty');
            $table->boolean('active');
            $table->integer('sort');
            $table->boolean('onsale');
            $table->boolean('special');
            $table->boolean('need_order');
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
        Schema::dropIfExists('products');
    }
}
