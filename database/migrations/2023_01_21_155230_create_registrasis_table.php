<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrasi', function (Blueprint $table) {
            $table->id();
            $table->string('no_registrasi', 45);
            $table->string('nama_pemilik_SPT');
            $table->integer('jumlah_SPT');
            $table->float("luas_tanah");
            $table->string('alamat');
            $table->string("perbatasan_tanah_utara");
            $table->string("perbatasan_tanah_timur");
            $table->string("perbatasan_tanah_selatan");
            $table->string("perbatasan_tanah_barat");
            $table->enum('status', ['diproses', 'menunggu', 'selesai'])->default('diproses');
            $table->string("document_SPT")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registrasis');
    }
};
