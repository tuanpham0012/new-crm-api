<?php

use Kalnoy\Nestedset\NestedSet;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('system_functions', function (Blueprint $table) {
            $table->id();
            $table->string('code')->comment('Mã chức năng');
            $table->string('name')->comment('Tên chức năng');
            $table->integer('position')->nullable()->comment('Vị trí thứ chức năng nếu cần.');
            NestedSet::columns($table);
            $table->string('function_group')->nullable()->comment('Nhóm chức năng nếu bị trùng tên');
            $table->string('related_array_id')->nullable()->comment('mảng id các chức năng có quan hệ với nhau');
            $table->string('blocked_array_id')->nullable()->comment('mảng id các chức năng không được chọn khi chức năng này không được chọn');
            $table->string('route_name')->nullable()->comment('kiểm tra chức năng');
            $table->tinyInteger('type')->default(0)->comment('nhóm quyền: 0 - hệ thống, 1-dự án');
            $table->boolean('status')->default(1)->comment('trạng thái: 0 - ngưng sd, 1- sử dụng');
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
        Schema::dropIfExists('system_functions');
    }
};
