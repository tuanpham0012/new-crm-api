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
        Schema::create('quote_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quote_id')->constrained()->comment('biên bản báo giá');
            $table->foreignId('product_id')->constrained()->comment('id sản phẩm');
            $table->bigInteger('price')->comment('giá sản phẩm');
            $table->integer('quantity')->comment('số lượng');
            $table->bigInteger('amount')->comment('thành tiền');
            $table->integer('tax_rate')->nullable()->comment('tỉ lệ thuế');
            $table->integer('fee_rate')->nullable()->comment('tỉ lệ phí');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quote_products');
    }
};
