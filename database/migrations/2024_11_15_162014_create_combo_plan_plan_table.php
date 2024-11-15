<?php

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
        Schema::create('combo_plan_plan', function (Blueprint $table) {
            $table->unsignedBigInteger('combo_plan_id');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('combo_plan_id')->references('id')->on('combo_plans')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->primary(['combo_plan_id', 'plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('combo_plan_plan');
    }
};
