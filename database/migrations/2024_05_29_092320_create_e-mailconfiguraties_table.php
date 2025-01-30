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
        Schema::create('emailconfiguraties', function (Blueprint $table) {
            $table->id();
            $table->string('name_from');
            $table->string('email_from');
            $table->text('password');
            $table->string('host');
            $table->integer('port');
            $table->enum('encryption', ['tls', 'ssl']);
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('e-mailconfiguraties');
    }
};
