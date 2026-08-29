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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('reference')->unique();

            $table->string('sector')->nullable();
            $table->string('location')->default('Ouagadougou');
            $table->string('contract_type')->nullable();

            $table->text('short_description')->nullable();
            $table->longText('description');

            $table->text('profile')->nullable();
            $table->text('requirements')->nullable();

            $table->date('published_at')->nullable();
            $table->date('deadline')->nullable();

            $table->boolean('is_published')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_offers');
    }
};