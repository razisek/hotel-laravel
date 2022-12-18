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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedInteger('capacity');
            $table->unsignedDouble('room_size')->nullable();
            $table->boolean('with_breakfast')->default(false);
            $table->boolean('has_wifi')->default(false);
            $table->string('smoking_preference');
            $table->boolean('has_terrace')->default(false);
            $table->boolean('has_common_area')->default(false);
            $table->foreignId('property_id')
                ->constrained()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('rooms');
    }
};
