<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('model');
        $table->integer('year');
        $table->decimal('price_per_day', 8, 2);
        $table->string('image')->nullable();
        $table->enum('status', ['available', 'unavailable'])->default('available');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
