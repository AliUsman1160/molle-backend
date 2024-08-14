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
            $table->string('fullname');
            $table->string('email')->unique();
            $table->text('password'); 
            $table->string('phone_number')->nullable()->index();
            $table->char('gender', 1);
            $table->string('username')->unique()->nullable();
            $table->boolean('phone_verified')->default(false); 
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_blocked')->default(false);
            $table->string('image')->nullable();
            $table->boolean('is_superadmin')->default(false);
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
