<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id');
//            $table->string('name');
            $table->string('image')->nullable();
            $table->float('discount');
//            $table->string('url')->unique();
//            $table->text('description')->nullable();
//            $table->string('meta_title')->nullable();
//            $table->string('meta_description')->nullable();
//            $table->string('meta_keywords')->nullable();
            $table->boolean('show_in_main')->default('0');
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('categories');
    }
}
