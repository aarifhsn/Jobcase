<?php

use App\Constant\RecruiterConstant;
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
        Schema::create('recruiters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('designation');
            $table->string('department');
            $table->string('phone');
            $table->string('email');
            $table->text('bio')->nullable();
            $table->enum('status', [RecruiterConstant::STATUS_ACTIVE, RecruiterConstant::STATUS_INACTIVE])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recruiters', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('recruiters');
    }
};
