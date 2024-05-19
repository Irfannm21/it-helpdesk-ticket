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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('pc_id')->nullable();
            $table->unsignedBigInteger('printer_id')->nullable();
            $table->unsignedBigInteger('network_id')->nullable();

            $table->foreign('pc_id')->references('id')->on('ref_product');
            $table->foreign('printer_id')->references('id')->on('ref_product');
            $table->foreign('network_id')->references('id')->on('ref_product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['pc_id']);
            $table->dropForeign(['printer_id']);
            $table->dropForeign(['network_id']);
            $table->dropColumn(['pc_id']);
            $table->dropColumn(['printer_id']);
            $table->dropColumn(['network_id']);
        });
    }
};
