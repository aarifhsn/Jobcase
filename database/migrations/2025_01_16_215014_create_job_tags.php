<?php

use App\Models\Job;
use App\Models\Tag;
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
        Schema::create('job_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Job::class, 'job_id')->onDelete('cascade');
            $table->foreignIdFor(Tag::class, 'tag_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_tags', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['tag_id']);
        });
        Schema::dropIfExists('job_tags');
    }
};
