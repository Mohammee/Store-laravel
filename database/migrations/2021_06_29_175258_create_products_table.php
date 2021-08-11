<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->float('price');
            $table->unsignedBigInteger('quantity');
            $table->string('sku')->nullable();
            $table->string('vedio')->nullable();
            $table->boolean('free_shipping')->default(0);
            $table->unsignedBigInteger('views');
            $table->unsignedBigInteger('points')->nullable();
            $table->string('main_image')->nullable();
            $table->float('shipping')->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('status')->default(1);
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
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
