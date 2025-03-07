<?php

use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;
use App\Models\Recruiter;
use App\Constant\JobConstant;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Company::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Location::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(User::class, 'created_by')->constrained('users')->onDelete('cascade');

            $table->string('title');
            $table->text('description');
            $table->string('experience')->nullable();
            $table->enum('type', [
                JobConstant::TYPE_FULL_TIME,
                JobConstant::TYPE_PART_TIME,
                JobConstant::TYPE_CONTRACT,
                JobConstant::TYPE_TEMPORARY,
                JobConstant::TYPE_INTERNSHIP,
                JobConstant::TYPE_VOLUNTEER,
                JobConstant::TYPE_FREELANCE,
                JobConstant::TYPE_OTHER
            ])->default(JobConstant::TYPE_FULL_TIME);
            $table->string('slug')->unique();
            $table->integer('vacancy')->default(1);
            $table->string('qualification')->nullable();
            $table->string('duration')->nullable();
            $table->string('salary_range');
            $table->string('application_link')->nullable();
            $table->string('circular_link')->nullable();
            $table->string('application_email');
            $table->string('application_phone');
            $table->dateTime('start_date')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->enum('status', [JobConstant::STATUS_ACTIVE, JobConstant::STATUS_INACTIVE, JobConstant::STATUS_ON_REVIEW, JobConstant::STATUS_BLOCKED, JobConstant::STATUS_EXPIRED])->default(JobConstant::STATUS_INACTIVE);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_jobs', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['location_id']);
            $table->dropForeign(['created_by']);
        });
        Schema::dropIfExists('company_jobs');
    }
};
