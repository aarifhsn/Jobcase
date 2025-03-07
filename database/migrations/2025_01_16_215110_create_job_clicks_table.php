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
        Schema::create('job_clicks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Job::class, 'job_id')->constrained("company_jobs")->onDelete('cascade');
            $table->foreignIdFor(User::class, 'user_id')->nullable()->constrained()->onDelete('set null');
            $table->ipAddress('ip_address')->nullable();
            $table->text('user_agent');
            $table->json('details')->nullable();
            $table->string('referer')->nullable();
            $table->dateTime('clicked_at');
            $table->integer('click_count')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_clicks', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
        });
        Schema::dropIfExists('job_clicks');
    }
};
