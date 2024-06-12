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
        Schema::create('trans_ticket', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('client_id');
            $table->dateTime('datetime');
            $table->longText('description');
            $table->enum('status',['Draft','Waiting','On Repair','Completed']);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_ticket');
    }
};
