<?php

use App\Models\Category;
use App\Models\Company;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class, 'company_id')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->enum('plan', ['free', 'basic', 'pro'])->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->double('price')->nullable();
            $table->integer('job_limit')->default(3);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscriptions', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
        });
        Schema::dropIfExists('subscriptions');
    }
};
