<?php

use App\Models\Candidate;
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
        Schema::create('education_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Candidate::class, 'candidate_id')->constrained()->onDelete('cascade');
            $table->foreignIdFor(Location::class, 'location_id')->constrained()->onDelete('cascade');
            $table->string('degree_name');
            $table->string('institution_name');
            $table->string('study_group')->nullable();
            $table->string('major')->nullable();
            $table->string('department')->nullable();
            $table->string('education_level')->nullable();
            $table->string('result');
            $table->decimal('cgpa', 4, 2)->nullable();
            $table->integer('percentage')->nullable();
            $table->boolean('is_currently_studying')->default(false);
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
        Schema::table('education_details', function (Blueprint $table) {
            $table->dropForeign(['candidate_id']);
            $table->dropForeign(['location_id']);
        });
        Schema::dropIfExists('education_details');
    }
};
