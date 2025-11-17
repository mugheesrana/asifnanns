<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->string('transmission')->nullable()->after('price');
            $table->string('engine_type')->nullable()->after('transmission');
            $table->string('fuel_type')->nullable()->after('engine_type');
            $table->string('condition')->nullable()->after('fuel_type');
            $table->boolean('is_sold')->default(false)->after('condition');
            $table->boolean('is_featured')->default(false)->after('is_sold');
        });
    }

    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn([
                'transmission',
                'engine_type',
                'fuel_type',
                'condition',
                'is_sold',
                'is_featured',
            ]);
        });
    }
};
