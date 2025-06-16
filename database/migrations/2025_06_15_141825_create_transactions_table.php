<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Primary key: big integer, auto increment

            $table->foreignId('user_id') // cleaner way to define foreign key column
                ->constrained('users') // references id on users table
                ->onDelete('cascade'); // delete transactions if user is deleted

            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending'); // e.g. pending, completed, cancelled

            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};

