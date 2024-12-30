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
        Schema::create('grant_members', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('grant_id')->constrained('grants'); // Foreign key to grants.id
            $table->foreignId('academician_id')->constrained('academicians'); // Foreign key to academicians.id
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grant_members');
    }
};