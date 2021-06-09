<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('second_name')->nullable();
            $table->string('category')->nullable();
            $table->string('address')->nullable();
            $table->text('description')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('website_url')->nullable();
            $table->string('social_link')->nullable();
            $table->string('photo_path')->nullable();
            $table->unsignedBigInteger('shop_chain_id')->nullable();
            $table->foreign('shop_chain_id')->references('id')->on('shop_chain');
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
        Schema::dropIfExists('shop');
    }
}
