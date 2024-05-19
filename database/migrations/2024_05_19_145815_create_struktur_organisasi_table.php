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
        Schema::create('ref_struktur_organization', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('ref_struktur_organization');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ref_struktur_organization');
    }
};
