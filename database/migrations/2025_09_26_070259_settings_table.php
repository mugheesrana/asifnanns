<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // General Info
            $table->string('site_name')->nullable();         // Company / site name
            $table->string('slogan')->nullable();            // Tagline
            $table->string('logo')->nullable();              // Path to logo
            $table->string('favicon')->nullable();           // Path to favicon
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();          // City / Country
            $table->text('address')->nullable();             // Full address
            $table->text('description')->nullable();         // About / Meta description
            $table->string('made_with')->nullable();         // "Made with ❤️ by XYZ"

            // SMTP / Mail Settings
            $table->string('mail_mailer')->nullable();       // smtp, sendmail, log etc.
            $table->string('mail_host')->nullable();
            $table->string('mail_port')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_encryption')->nullable();   // tls, ssl, null
            $table->string('mail_from_address')->nullable(); // e.g. no-reply@domain.com
            $table->string('mail_from_name')->nullable();    // e.g. MyCar Market
            $table->boolean('smtp_active')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
