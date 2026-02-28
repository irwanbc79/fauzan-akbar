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
        Schema::create('roadmap_phases', function (Blueprint $table) {
            $table->id();
            $table->string('phase'); // Tahap 1, Tahap 2, Tahap 3
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('icon')->default('📋');
            $table->string('status')->default('upcoming'); // active, upcoming, completed
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roadmap_phases');
    }
};
