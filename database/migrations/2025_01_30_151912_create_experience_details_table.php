<?php

use App\Models\Candidate;
use App\Models\Company;
use App\Models\Location;
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
        Schema::create('experience_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Candidate::class, 'candidate_id')->onDelete('cascade');
            $table->foreignIdFor(Company::class, 'company_id')->onDelete('cascade')->nullable();
            $table->foreignIdFor(Location::class, 'location_id')->onDelete('cascade');
            $table->string('company_name');
            $table->string('job_title');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('experience_details', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropForeign(['company_id']);
            $table->dropForeign(['location_id']);
        });
        Schema::dropIfExists('experience_details');
    }
};
