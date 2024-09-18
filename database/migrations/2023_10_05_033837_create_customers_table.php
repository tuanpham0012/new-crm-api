<?php

use App\Enums\CustomerEnum;
use App\Models\Customer;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code')->unique();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedBigInteger('avatar')->nullable();
            $table->date('birthday')->nullable();
            $table->enum('type', Customer::CUSTOMER_TYPE)->nullable();
            $table->string("tax_code")->comment("Mã số thuế")->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->string('bank_number')->nullable()->comment('số tài khoản ngân hàng');
            $table->string('bank_username')->nullable()->comment('tên tài khoản ngân hàng');
            $table->foreignId('user_id')->nullable()->constrained()->comment('người phụ trách');
            $table->foreignId('observer_id')->nullable()->constrained('users')->comment('người quan sát');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('customer_source_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('ward_id')->nullable();
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
        Schema::dropIfExists('customers');
    }
};
