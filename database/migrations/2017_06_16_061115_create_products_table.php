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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255);
            $table->string('url_key', 255)->unique();
            $table->decimal('price',10,2);
            $table->text('description')->nullable();
            $table->integer('qty')->nullable();
            $table->boolean('active')->default(false);
            $table->integer('sort')->nullable();
            $table->boolean('onsale')->nullable();
            $table->boolean('special')->nullable();
            $table->boolean('need_order')->nullable();
            $table->integer('category_id')->unsigned();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
            $table->dropForeign('products_category_id_foreign');
        });
        Schema::dropIfExists('products');
    }
}
