<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->time('check_in_time');
            $table->time('check_out_time');
            $table->string('website')->nullable();
            $table->text('address');
            $table->text('policy')->nullable();
            $table->tinyInteger('star_rating')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->double('rating');
            $table->integer('review_count');
            $table->string('status');
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
        Schema::dropIfExists('properties');
    }
};
