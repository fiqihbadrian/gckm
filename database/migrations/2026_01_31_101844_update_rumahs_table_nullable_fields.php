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
        Schema::table('rumahs', function (Blueprint $table) {
            $table->integer('jumlah_penghuni')->nullable()->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rumahs', function (Blueprint $table) {
            $table->integer('jumlah_penghuni')->nullable(false)->default(0)->change();
        });
    }
};
