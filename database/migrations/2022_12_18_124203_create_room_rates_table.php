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
        Schema::create('room_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->date('date');
            $table->unsignedInteger('price');
            $table->timestamps();
            $table->unique(['date', 'room_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_rates');
    }
};
