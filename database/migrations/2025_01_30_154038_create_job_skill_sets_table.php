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
        Schema::create('job_skill_sets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained("company_jobs")->onDelete('cascade');
            $table->foreignId('skill_set_id')->constrained()->onDelete('cascade');
            $table->integer('skill_level')->default(1)->comment('1-10');
            $table->boolean('is_required')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_skill_sets', function (Blueprint $table) {
            $table->dropForeign(['job_id']);
            $table->dropForeign(['skill_set_id']);
        });
        Schema::dropIfExists('job_skill_sets');
    }
};
