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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('adress', 100);
            $table->string('country', 50);
            $table->string('description', 1000);
            $table->string('area');
            $table->string('image', 255);
            $table->integer('maxCapacity');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
