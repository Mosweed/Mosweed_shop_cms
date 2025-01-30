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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('billing_firstname');
            $table->string('billing_lastname');
            $table->string('billing_email');
            $table->string('billing_bisiness_name')->nullable();
            $table->string('billing_vat_number')->nullable();
            $table->string('billing_country');
            $table->string('billing_city');
            $table->string('billing_address');
            $table->string('billing_zipcode');
            $table->string('billing_housenumber');
            $table->string('billing_addition')->nullable();
            $table->string('billing_phonenumber');

            $table->string('shipping_firstname');
            $table->string('shipping_lastname');
            $table->string('shipping_email');
            $table->string('shipping_bisiness_name')->nullable();
            $table->string('shipping_vat_number')->nullable();
            $table->string('shipping_country');
            $table->string('shipping_city');
            $table->string('shipping_address');
            $table->string('shipping_zipcode');
            $table->string('shipping_housenumber');
            $table->string('shipping_addition')->nullable();
            $table->string('shipping_phonenumber');

            $table->text('order_note')->nullable();

            $table->decimal('shipping_cost', 8, 2);
            $table->decimal('Savings', 8, 2)->nullable();
            $table->decimal('total', 8, 2);
            $table->string('coupon_code')->nullable();
            $table->date('date');
            $table->foreignId('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->enum('status', ['Delivered', 'Canceled', 'Sent', 'In Progress', 'New'])->default('New');
            $table->foreignId('shipping_method')->references('id')->on('shipping_methods')->cascadeOnDelete();
            $table->string('pyment_method')->nullable();
            $table->enum('payment_status', ['Paid', 'Not Paid'])->default('Not Paid');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
