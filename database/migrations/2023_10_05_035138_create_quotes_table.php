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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code');
            $table->string('title')->comment('tiêu đề');
            $table->foreignId('project_id')->constrained()->comment('dự án');
            $table->foreignId('customer_id')->constrained()->comment('khách hàng');
            // $table->foreignId('create_id')->constrained('user_id')->comment('Người lập báo giá');
            $table->foreignId('approve_id')->constrained('users')->comment('Người duyệt báo giá');
            $table->date('quote_date')->comment('ngày báo giá');
            $table->string('receiver')->nullable()->comment('người nhận báo giá');
            $table->string('email')->nullable()->comment('email người nhận báo giá');
            $table->string('phone')->nullable()->comment('sdt người nhận báo giá');
            $table->text('note')->nullable()->comment('ghi chú');
            $table->unsignedBigInteger('portal_id')->nullable();
            $table->bigInteger('total_amount')->default(0)->comment('tổng tiền của báo giá');
            $table->tinyInteger('status')->default(0)->comment('0 - chưa duyệt, 1 - đã duyệt, 2 - đã hủy');
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
        Schema::dropIfExists('quotes');
    }
};
