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
        Schema::create('trans_realization', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('workplan_id');
            $table->unsignedBigInteger('technician_id')->nullable();
            $table->date('date')->nullable();
            $table->time('started')->nullable();
            $table->time('finished')->nullable();
            $table->enum('status',['New','Draft','Completed']);
            $table->timestamps();

            $table->foreign('workplan_id')->references('id')->on('trans_workplan');
            $table->foreign('technician_id')->references('id')->on('users');
        });

        Schema::create('trans_realization_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realization_id');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->time('started')->nullable();
            $table->time('finished')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('realization_id')->references('id')->on('trans_realization');
            $table->foreign('product_id')->references('id')->on('ref_product');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_realization_detail');
        Schema::dropIfExists('trans_realization');
    }
};
