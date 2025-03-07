<?php

use App\Constant\CandidateConstant;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class, 'user_id')->cascadeOnDelete();
            $table->foreignIdFor(Location::class, 'location_id')->cascadeOnDelete();
            $table->foreignIdFor(Category::class, 'category_id')->nullable()->nullOnDelete()->comment('Subscribed category');

            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('profile_picture')->nullable();
            $table->text('bio')->nullable();
            $table->enum('status', [CandidateConstant::STATUS_ACTIVE, CandidateConstant::STATUS_INACTIVE])->default(CandidateConstant::STATUS_ACTIVE);
            $table->decimal('current_salary', 10, 2)->nullable();
            $table->enum('is_paid_annually_monthly', [CandidateConstant::PAID_ANNUALLY, CandidateConstant::PAID_MONTHLY])->nullable();
            $table->string('currency')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['location_id']);
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('candidates');
    }
};
