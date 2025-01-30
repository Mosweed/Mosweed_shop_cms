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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->unique();
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('percentage')->nullable();
            $table->decimal('fast_price')->nullable();

            $table->enum('use_limites_type', ['unlimited', 'limited', 'one_time'])->default('one_time');
            $table->integer('limit')->nullable();
            $table->integer('is_used')->default(0);
            $table->timestamps();

        });

        Schema::create('user_coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('coupons_id');
            $table->timestamp('redeemed_at');

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('coupons_id')->references('id')->on('coupons');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('user_coupons');
    }
};
