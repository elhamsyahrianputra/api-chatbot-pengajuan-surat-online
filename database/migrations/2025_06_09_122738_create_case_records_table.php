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
        Schema::create('case_records', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->text('problem');
            $table->text('solution')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('frequency')->default(1);
            $table->float('confidence_score')->nullable();
            $table->enum('status', ['unverified', 'verified', 'deprecated'])->default('unverified')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_records');
    }
};
