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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('mã dự án');
            $table->string('name')->comment('tên dự án');
            $table->foreignId('city_id')->nullable()->constrained()->comment('id tỉnh/thành phố');
            $table->foreignId('project_type_id')->constrained()->comment('phân loại dự án');
            $table->foreignId('customer_id')->constrained()->comment('phân loại dự án');
            $table->foreignId('status_id')->constrained('system_statuses')->comment('trạng thái dự án');
            $table->string('description')->nullable()->comment('mô tả dự án');
            $table->string('note')->nullable()->comment('ghi chú dự án');
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
        Schema::dropIfExists('projects');
    }
};
