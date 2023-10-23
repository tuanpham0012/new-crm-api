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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            // $table->foreignId('product_group_id')->constrained()->comment('Nhóm sản phẩm');
            $table->bigInteger('product_group_id')->nullable()->comment('Nhóm sản phẩm');
            // $table->foreignId('unit_id')->constrained()->comment('Đơn vị tính');
            $table->bigInteger('unit_id')->nullable()->comment('Đơn vị tính');
            $table->bigInteger('price')->comment('đơn giá');
            $table->tinyInteger('edit_price')->default(1)->comment('Mặc định là 1: được phép sửa giá, 0 là không cho phép sửa giá');
            $table->string('image_link')->nullable()->comment('link ảnh sản phẩm');
            $table->string('note')->nullable()->comment('ghi chú');
            $table->boolean('status')->default(1)->comment('1 - sử dụng, 0 - ngưng sd');
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
        Schema::dropIfExists('products');
    }
};
