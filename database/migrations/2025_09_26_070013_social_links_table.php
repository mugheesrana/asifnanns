<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();   // e.g. "fab fa-facebook", "fab fa-twitter"
            $table->string('title')->nullable();  // e.g. "Facebook", "Instagram"
            $table->string('link')->nullable();   // e.g. "https://facebook.com/example"
            $table->integer('order')->default(0); // For sorting in header/footer
            $table->boolean('status')->default(true); // Show/Hide
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
