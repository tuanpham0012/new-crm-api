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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('tên ngân hàng');
            $table->string('def_name')->comment('tên viết tắt');
            $table->boolean('status')->default(1)->comment('1 - sử dụng, 0 - ngưng sd');
            $table->string('note')->nullable()->comment('ghi chú');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banks');
    }
};
