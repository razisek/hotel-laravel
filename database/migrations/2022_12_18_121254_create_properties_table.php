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
            $table->time('check_in_from');
            $table->time('check_in_until')->nullable();
            $table->time('check_out_from')->nullable();
            $table->time('check_out_until');
            $table->string('website')->nullable();
            $table->text('address');
            $table->tinyInteger('star_rating')->nullable();
            $table->double('latitude');
            $table->double('longitude');
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
