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
            $table->string('code')->unique()->after('id');
            $table->unsignedBigInteger('cpu_id')->after('password');
            $table->unsignedBigInteger('printer_id')->after('password');

            $table->foreign('cpu_id')->references('id')->on('ref_product');
            $table->foreign('printer_id')->references('id')->on('ref_product');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['cpu_id']);
            $table->dropForeign(['printer_id']);
            $table->dropColumn(['code','cpu_id','printer_id']);
        });
    }
};
