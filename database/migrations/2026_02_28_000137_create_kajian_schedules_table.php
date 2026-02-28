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
        Schema::create('kajian_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('day'); // Senin, Selasa, etc.
            $table->string('title');
            $table->string('ustaz');
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('platform')->default('zoom'); // zoom, whatsapp, offline
            $table->string('platform_link')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('upcoming'); // upcoming, completed, cancelled
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kajian_schedules');
    }
};
