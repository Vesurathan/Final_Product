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
        Schema::create('ip_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained(); // Assuming you have a 'users' table
            $table->string('ip');
            $table->string('city');
            $table->string('region');
            $table->string('country');
            $table->string('loc');
            $table->string('org');
            $table->string('postal');
            $table->string('timezone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_infos');
    }
};
