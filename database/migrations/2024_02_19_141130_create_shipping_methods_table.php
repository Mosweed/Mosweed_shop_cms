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
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('enabled')->default(true);
            $table->string('image')->nullable();
            $table->enum('type', ['Free', 'Fixed_rate', 'Local_pickup']);
            $table->decimal('cost', 10, 2)->default(0)->nullable();

            $table->decimal('min_order_amount', 10, 2)->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
