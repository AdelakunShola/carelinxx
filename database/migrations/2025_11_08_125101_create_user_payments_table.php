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
        Schema::create('user_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('fees_payment_id')->constrained()->onDelete('cascade');
            $table->string('payment_method'); // bank or btc
            $table->string('payment_type')->nullable();
            $table->string('payment_name')->nullable();
            $table->string('crypto_type')->nullable(); // usdt or ethereum
            $table->decimal('amount', 15, 2);
            $table->string('transaction_id')->unique();
            $table->text('transaction_proof')->nullable(); // screenshot/proof image
            $table->string('sender_address')->nullable(); // crypto wallet address
            $table->enum('status', ['pending', 'confirmed', 'rejected'])->default('pending');
            $table->text('admin_note')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_payments');
    }
};
