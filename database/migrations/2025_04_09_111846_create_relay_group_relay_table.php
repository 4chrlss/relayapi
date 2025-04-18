<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('relay_group_relay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('relay_id')->constrained('relay')->onDelete('cascade');
            $table->foreignId('relay_group_id')->constrained()->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relay_group_relay');
    }
};
