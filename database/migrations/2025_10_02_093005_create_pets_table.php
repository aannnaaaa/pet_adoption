<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 225);
            $table->string('species', 50);
            $table->string('breed', 225)->nullable();
            $table->integer('age')->nullable();
            $table->enum('sex', ['M', 'F', 'U'])->default('U');
            $table->text('description')->nullable();
            $table->string('main_photo', 512)->nullable();
            $table->foreignId('owner_id')->nullable()->constrained('users')->onDelete('set null')->onUpdate('cascade');
            $table->enum('status', ['available', 'reserved', 'adopted', 'not_for_adoption'])->default('available');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
