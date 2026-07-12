<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('followups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // salesperson, for querying "my followups"
            $table->string('car'); // short label, e.g. "Proton X50"
            $table->date('due_date');
            $table->boolean('urgent')->default(false);
            $table->boolean('completed')->default(false);
            $table->timestamps();

            $table->index(['user_id', 'due_date', 'completed']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('followups');
    }
};
