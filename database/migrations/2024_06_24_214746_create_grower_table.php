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
        Schema::create('growers', function (Blueprint $table) {
            $table->id();
            $table->string('picture', 255);
            $table->string('description', 250);
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('growers');
    }
};
