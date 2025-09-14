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
        Schema::create('case_feedback', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('case_record_id')->constrained('case_records');
            $table->foreignUuid('user_id')->constrained('users');
            $table->enum('type', ['like', 'dislike']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_feedback');
    }
};
