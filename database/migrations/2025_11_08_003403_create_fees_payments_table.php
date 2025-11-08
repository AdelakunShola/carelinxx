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
        Schema::create('fees_payments', function (Blueprint $table) {
            $table->id();
            $table->string('payment_method')->nullable(); // bank or btc
            $table->string('payment_type')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('btc_address')->nullable();
            $table->string('crypto_type')->nullable(); // usdt or ethereum
            $table->string('qr_code')->nullable(); // image path
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees_payments');
    }
};
