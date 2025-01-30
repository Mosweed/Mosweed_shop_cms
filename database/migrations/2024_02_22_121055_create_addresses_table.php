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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('country');
            $table->string('bisiness_name')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('city');
            $table->string('address');
            $table->string('zipcode');
            $table->string('housenumber');
            $table->string('addition')->nullable();
            $table->boolean('standard')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
