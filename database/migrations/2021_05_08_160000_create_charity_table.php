<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charity', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('second_name');
            $table->string('short_name');
            $table->text('description')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('category')->nullable();
            $table->string('website_url')->nullable();
            $table->string('social_link')->nullable();
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('charity');
    }
}
