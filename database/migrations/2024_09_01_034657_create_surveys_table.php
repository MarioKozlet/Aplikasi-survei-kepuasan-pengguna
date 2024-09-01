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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->integer('ease_of_use');
            $table->integer('interface_intuitiveness');
            $table->integer('responsiveness');
            $table->integer('feature_completeness');
            $table->integer('feature_suitability');
            $table->integer('stability');
            $table->integer('ui_design');
            $table->integer('customer_support');
            $table->integer('security_and_privacy');
            $table->string('additional_feedback')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
