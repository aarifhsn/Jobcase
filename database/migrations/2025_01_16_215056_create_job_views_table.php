<?php

use App\Models\Job;
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
        Schema::create('job_views', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Job::class, 'job_id')->constrained("company_jobs")->onDelete('cascade');
            $table->foreignIdFor(User::class, 'user_id')->nullable()->constrained()->onDelete('set null');
            $table->ipAddress('ip')->nullable();
            $table->text('user_agent');
            $table->json('details')->nullable();
            $table->dateTime('viewed_at');
            $table->integer('view_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_views', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
        });
        Schema::dropIfExists('job_views');
    }
};
