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
        Schema::table('konsultasi', function (Blueprint $table) {
            $table->text('respon_awal')->nullable()->change();
            $table->text('solusi')->nullable()->change();
            $table->date('tgl_respon')->nullable()->change();
            $table->string('jam_respon', 10)->nullable()->change();
            $table->date('tgl_selesai')->nullable()->change();
            $table->string('jam_selesai', 12)->nullable()->change();
            $table->string('user_respon', 16)->nullable()->change();
            $table->string('user_selesai', 16)->nullable()->change();
            $table->string('dok_dukung1', 100)->nullable()->change();
            $table->string('dok_dukung2', 100)->nullable()->change();
            $table->string('dok_dukung3', 100)->nullable()->change();
            $table->string('dok_dukung4', 100)->nullable()->change();
            $table->string('dok_dukung5', 100)->nullable()->change();
            $table->string('dok_dukung6', 100)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konsultasi', function (Blueprint $table) {
            $table->text('respon_awal')->change();
            $table->text('solusi')->change();
            $table->date('tgl_respon')->change();
            $table->string('jam_respon', 10)->change();
            $table->date('tgl_selesai')->change();
            $table->string('jam_selesai', 12)->change();
            $table->string('user_respon', 16)->change();
            $table->string('user_selesai', 16)->change();
            $table->string('dok_dukung1', 100)->change();
            $table->string('dok_dukung2', 100)->change();
            $table->string('dok_dukung3', 100)->change();
            $table->string('dok_dukung4', 100)->change();
            $table->string('dok_dukung5', 100)->change();
            $table->string('dok_dukung6', 100)->change();
        });
    }
};