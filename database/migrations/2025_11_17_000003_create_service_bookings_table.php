<?php 
// database/migrations/2025_11_17_000003_create_service_bookings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->id();

            // which service they booked (optional)
            $table->foreignId('service_id')
                ->nullable()
                ->constrained('services')
                ->nullOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('phone', 30)->nullable();

            $table->string('subject')->nullable();
            $table->date('preferred_date')->nullable();

            $table->string('service_type')->nullable(); // Maintenance / Repair / etc.

            $table->text('message')->nullable();
            $table->string('attachment')->nullable(); // file path

            $table->string('status')->default('pending'); // pending, confirmed, completed, cancelled

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_bookings');
    }
};
