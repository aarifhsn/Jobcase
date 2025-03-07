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
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments')->onDelete('cascade');
            $table->string('payment_currency')->default('BDT');
            $table->string('payment_description')->nullable();
            $table->string('payment_response');
            $table->string('payer_email')->nullable();
            $table->double('tax_amount', 8, 2)->nullable();
            $table->json('additional_info')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('payment_details', function (Blueprint $table) {
            $table->dropForeign(['payment_id']);
        });
        Schema::dropIfExists('payment_details');
    }
};
