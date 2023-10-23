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
        Schema::create('customer_call_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('Người liên hệ');
            $table->integer('customer_id');
            $table->string('phone_contacts');
            $table->integer('time');
            $table->string('content')->nullable();
            $table->string('link_record')->nullable();
            $table->text('note')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('customer_call_histories');
    }
};
