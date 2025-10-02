<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained('pets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('created_at')->useCurrent();
            $table->enum('status', ['active', 'closed'])->default('active');
            $table->string('location_city', 100)->nullable();
            $table->decimal('adoption_fee', 8, 2)->default(0.00);
            $table->integer('views')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
