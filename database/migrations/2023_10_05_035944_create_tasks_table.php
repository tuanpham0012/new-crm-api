<?php

use App\Enums\TaskEnum;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('name');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('content')->nullable();
            $table->enum('type', TaskEnum::TASK_TYPE);
            $table->integer('user_id')->comment('Người tạo');
            $table->integer('customer_id')->nullable()->comment('Khách hàng liên quan');
            $table->integer('task_status_id');
            $table->integer('project_id')->nullable();
            $table->unsignedBigInteger('portal_id')->nullable();
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
        Schema::dropIfExists('tasks');
    }
};
