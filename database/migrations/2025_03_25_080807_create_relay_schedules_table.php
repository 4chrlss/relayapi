<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('relay_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('relay_id');
            $table->time('on_time');  // Oras ng pag-ON
            $table->time('off_time'); // Oras ng pag-OFF
            $table->timestamps();

            $table->foreign('relay_id')->references('id')->on('relay')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('relay_schedules');
    }
};

