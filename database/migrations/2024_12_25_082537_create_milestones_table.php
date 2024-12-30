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
        Schema::create('milestones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grant_id')->constrained('grants');
            $table->string('milestone_name');
            $table->date('target_completion_date');
            $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending');
            $table->string('deliverable');
            $table->text('remarks')->nullable(); // Optional remarks
            $table->timestamp('date_updated')->nullable(); // Optional date_updated timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milestones');
    }
};