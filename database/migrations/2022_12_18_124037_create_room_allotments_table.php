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
        Schema::create('room_allotments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->date('date');
            $table->unsignedInteger('available');
            $table->unsignedInteger('used');
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
        Schema::dropIfExists('room_allotments');
    }
};
