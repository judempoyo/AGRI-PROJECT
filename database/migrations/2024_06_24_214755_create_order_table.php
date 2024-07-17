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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ref', 20)->unique();
            $table->date('date');
            $table->double('total');
            $table->string('payment_method',50);
            $table->string('delivery_method',50);
            $table->string('delivery_adress',250);
            $table->string('state');
            $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('grower_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
