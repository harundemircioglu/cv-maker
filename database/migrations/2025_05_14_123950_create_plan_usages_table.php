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
        Schema::create('plan_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('cv_downloads')->default(0)->nullable();
            $table->integer('work_experiences')->default(0)->nullable();
            $table->integer('educations')->default(0)->nullable();
            $table->integer('certificates')->default(0)->nullable();
            $table->integer('languages')->default(0)->nullable();
            $table->integer('references')->default(0)->nullable();
            $table->integer('projects')->default(0)->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_usages');
    }
};
