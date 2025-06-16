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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('category'); // e.g., t-shirt, shoes, belt, watch
        $table->text('description')->nullable();
        $table->decimal('price', 8, 2);
        $table->decimal('old_price', 8, 2)->nullable();
        $table->integer('stock')->default(0);
        $table->string('image')->nullable();
        $table->float('rating')->default(0);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
