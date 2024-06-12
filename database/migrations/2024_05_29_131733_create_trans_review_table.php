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
        Schema::create('trans_review', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realization_id');
            $table->unsignedBigInteger('user_id');
            $table->date('date')->nullable();
            $table->enum('status',['New','Draft','Completed']);
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('realization_id')->references('id')->on('trans_realization');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_review');
    }
};
