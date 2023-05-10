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
        Schema::create('metting_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Organization');
            $table->string('phone');
            $table->string('email');
            $table->text('Address')->nullable();
            $table->date('date');
            $table->time('in_time');
            $table->time('out_time');
            $table->integer('user_id');
            $table->integer('type_id');
            $table->integer('status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metting_schedules');
    }
};
