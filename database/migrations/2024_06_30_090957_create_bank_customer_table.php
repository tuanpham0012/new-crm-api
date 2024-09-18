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
        // Schema::create('bank_customer', function (Blueprint $table) {
        //     $table->foreignId('customer_id')->constrained();
        //     $table->foreignId('bank_id')->constrained();
        //     $table->string('bank_number')->nullable()->comment('số tài khoản ngân hàng');
        //     $table->string('bank_username')->nullable()->comment('tên tài khoản ngân hàng');

        //     $table->unique(['customer_id', 'bank_id']);
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bank_customer');
    }
};
