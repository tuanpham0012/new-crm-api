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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('home_town')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('gender')->nullable();
            $table->string('ethnic')->nullable();
            $table->string('cmnd')->nullable();
            $table->string('cmnd_address')->nullable()->comment('Nơi cấp cmnd');
            $table->string('status')->nullable();
            $table->string('avatar')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username')->unique()->comment('tài khoản user');
            $table->string('password');
            $table->integer('role_id')->default('3');
            $table->string('note')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
