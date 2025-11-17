<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
public function up(): void
{
Schema::create('car_versions', function (Blueprint $table) {
$table->id();
$table->foreignId('model_id')->constrained('car_models')->cascadeOnDelete();
$table->string('title');
$table->string('slug')->nullable()->unique();
$table->json('meta')->nullable(); // e.g. engine, transmission, cc as JSON
$table->timestamps();
});
}


public function down(): void
{
Schema::dropIfExists('car_versions');
}
};
