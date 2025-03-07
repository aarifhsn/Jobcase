<?php

use App\Constant\CompanyConstant;
use App\Models\Location;
use App\Models\Recruiter;
use App\Models\User;
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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Location::class, 'location_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete()->comment('Create company by user');
            $table->foreignId('recruiter_id')->nullable()->constrained()->cascadeOnDelete();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('contact_number');
            $table->string('industry')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->enum('status', [
                CompanyConstant::STATUS_ACTIVE,
                CompanyConstant::STATUS_INACTIVE,
                CompanyConstant::STATUS_PENDING,
                CompanyConstant::STATUS_APPROVED,
                CompanyConstant::STATUS_REJECTED
            ])->default(CompanyConstant::STATUS_PENDING);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropForeign(['recruiter_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('companies');
    }
};
