<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
public function up(): void
{
Schema::create('cars', function (Blueprint $table) {
$table->id();


// Owner / dealer
$table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();


// Classification
$table->foreignId('brand_id')->nullable()->constrained('brands')->nullOnDelete();
$table->foreignId('model_id')->nullable()->constrained('car_models')->nullOnDelete();
$table->foreignId('version_id')->nullable()->constrained('car_versions')->nullOnDelete();


// Car details
$table->year('year')->nullable();
$table->string('city')->nullable();
$table->string('registered_in')->nullable();
$table->string('exterior_color')->nullable();
$table->unsignedInteger('mileage')->nullable()->comment('mileage in kilometers');
$table->string('mileage_unit')->default('km');
$table->decimal('price', 14, 2)->nullable();
$table->string('currency', 8)->default('PKR');
$table->text('description')->nullable();


// Contact preference (if different from user)
$table->string('contact_name')->nullable();
$table->string('contact_phone')->nullable();
$table->string('contact_phone_secondary')->nullable();
$table->boolean('allow_whatsapp')->default(false);


// Status & publish
$table->enum('status', ['draft', 'active', 'inactive', 'sold'])->default('draft');
$table->timestamp('published_at')->nullable();


$table->softDeletes();
$table->timestamps();


$table->index(['brand_id','model_id','version_id']);
$table->index(['status','published_at']);
});
}


public function down(): void
{
Schema::dropIfExists('cars');
}
};
