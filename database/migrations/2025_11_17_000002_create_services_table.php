<?php 
// database/migrations/2025_11_17_000002_create_services_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            // usually this will be a subcategory row in service_categories
            $table->foreignId('service_category_id')
                ->constrained('service_categories')
                ->onDelete('cascade');

            $table->string('title');
            $table->string('slug')->unique();

            $table->string('thumbnail')->nullable();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();

            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);

            // optional SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
