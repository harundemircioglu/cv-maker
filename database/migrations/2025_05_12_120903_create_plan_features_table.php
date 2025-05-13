<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')
                ->nullable()
                ->constrained('plans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('max_cv_downloads')->default(2)->nullable();
            $table->integer('max_work_experiences')->default(2)->nullable();
            $table->integer('max_educations')->default(2)->nullable();
            $table->integer('max_certificates')->default(2)->nullable();
            $table->integer('max_languages')->default(2)->nullable();
            $table->integer('max_references')->default(2)->nullable();
            $table->integer('max_projects')->default(2)->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_features');
    }
};
