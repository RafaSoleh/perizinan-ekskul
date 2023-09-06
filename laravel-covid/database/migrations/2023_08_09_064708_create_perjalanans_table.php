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
        Schema::create('perjalanan', function (Blueprint $table) {
            $table->id('id_perjalanan');
            $table->char('nik', 16);
            $table->dateTime('tgl_perjalanan');
            $table->char('suhu_tubuh');
            $table->char('lokasi');


            $table->timestamps();
            $table->foreign('nik')->references('nik')->on('masyarakat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perjalanans');
    }
};
