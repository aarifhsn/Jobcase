<?php

use App\Constant\JobApplicationConstant;
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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained("company_jobs")->onDelete('cascade');
            $table->foreignId('candidate_id')->constrained()->onDelete('cascade');
            $table->enum('status', [
                JobApplicationConstant::STATUS_APPLIED,
                JobApplicationConstant::STATUS_SHORTLISTED,
                JobApplicationConstant::STATUS_REJECTED,
                JobApplicationConstant::STATUS_HIRED
            ])->default(JobApplicationConstant::STATUS_APPLIED);

            $table->text('cover_letter')->nullable();
            $table->text('resume')->nullable();
            $table->text('attachment')->nullable();
            $table->timestamp('shortlisted_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamp('hired_at')->nullable();
            $table->timestamp('applied_at')->useCurrent();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
