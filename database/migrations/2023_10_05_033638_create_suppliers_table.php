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
        // Schema::create('suppliers', function (Blueprint $table) {
        //     $table->bigIncrements("id");
        //     $table->uuid("uuid")->unique();
        //     $table->string("tax_code")->comment("Mã số thuế")->nullable();
        //     $table->string("agency_name")->comment("Tên công ty")->nullable();
        //     $table->string("agency_address")->comment("Địa chỉ công ty")->nullable();
        //     $table->integer("phone_number")->comment("Số điện thoại")->nullable();
        //     $table->unsignedBigInteger('portal_id')->nullable();
        //     $table->boolean("status")->default(1)->comment("Trạng thái:1- hoạt động và 0 - ngừng hoạt động");
        //     $table->unsignedBigInteger("created_by")->nullable();
        //     $table->unsignedBigInteger("updated_by")->nullable();
        //     $table->unsignedBigInteger("deleted_by")->nullable();
        //     $table->softDeletes();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
