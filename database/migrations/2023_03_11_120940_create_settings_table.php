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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->longText('description')->nullable();
            $table->text('logo_path',500)->nullable();
            $table->text('favicon_path',500)->nullable();
            $table->string('phone_one',50)->nullable();
            $table->string('phone_two',50)->nullable();
            $table->string('email_one')->nullable();
            $table->string('email_two')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_mail')->nullable();
            $table->string('office_hours')->nullable();
            $table->string('google_map')->nullable();
            $table->string('footer_text')->nullable();
            $table->longText('custom_css')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
