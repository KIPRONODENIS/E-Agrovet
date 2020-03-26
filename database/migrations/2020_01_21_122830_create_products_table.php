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
                  $table->bigIncrements('id');
                  $table->string('name');

                  $table->integer('price');
                  $table->string('description')->text();
                  $table->string('image');
                  $table->integer('stock');
                  $table->bigInteger('user_id')->unsigned()->index(); // this is working
                  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                  $table->bigInteger('agrovet_id')->default(1); // this is working

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
