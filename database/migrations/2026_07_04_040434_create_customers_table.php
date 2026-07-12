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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // salesperson who owns this lead
            $table->string('name');
            $table->string('phone');
            $table->string('car'); // e.g. "Perodua Myvi 1.5 AV"
            $table->enum('status', ['hot', 'warm', 'follow_up', 'cold'])->default('warm');
            $table->timestamp('last_contact_at')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
