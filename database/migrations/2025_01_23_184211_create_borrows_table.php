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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained('inventories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('borrow_date');
            $table->date('return_date');
            $table->date('returned_date')->nullable();
            $table->enum('status', ['borrowed', 'returned', 'pending', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
