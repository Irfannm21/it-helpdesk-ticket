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
        Schema::create('trans_workplan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticket_id')->nullable();
            $table->unsignedBigInteger('technician_id')->nullable();
            $table->datetime('started')->nullable();
            $table->datetime('finished')->nullable();
            $table->longtext('description')->nullable();
            $table->enum('status',['New','Draft','Completed']);
            $table->timestamps();

            $table->foreign('ticket_id')->references('id')->on('trans_ticket');
            $table->foreign('technician_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_workplan');
    }
};
