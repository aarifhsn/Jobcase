<?php

use App\Models\User;
use App\Models\Company;
use App\Models\Subscription;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class, 'company_id')->onDelete('cascade');
            $table->foreignIdFor(Subscription::class, 'subscription_id')->constrained()->onDelete('cascade');
            $table->string('method');
            $table->string('gateway')->nullable();
            $table->string('reference')->nullable();
            $table->string('transaction_code')->nullable();
            $table->enum('status', ['pending', 'paid', 'failed', 'cancelled'])->default('pending');
            $table->double('amount', 8, 2);
            $table->dateTime('paid_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['comapny_id']);
            $table->dropForeign(['subscription_id']);
        });
        Schema::dropIfExists('payments');
    }
};
