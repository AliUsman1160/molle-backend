<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedBigInteger('event_type_id');
            $table->unsignedBigInteger('created_by_user_id');
            $table->string('image', 255)->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('location', 255);
            $table->date('start_date');
            $table->date('end_date');
            $table->text('description')->nullable();
            $table->boolean('paid')->default(false);
            $table->decimal('amount', 10, 2)->default(0.00);
            $table->integer('seat_limit')->default(0);
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade');
            $table->foreign('created_by_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
}
