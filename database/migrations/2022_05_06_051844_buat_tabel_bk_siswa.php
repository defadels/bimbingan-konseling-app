<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelBkSiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('format_bk',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('nomor_bk')->nullable();
            $table->string('judul_bk')->nullable();
            $table->text('pokok_pembahasan')->nullable();
            $table->string('judul_tanggapan')->nullable();
            $table->text('tanggapan')->nullable();
            $table->enum('status',['Sudah Ditanggapi','Belum Ditanggapi']);
            $table->enum('jenis',['Konseling Pribadi','Konseling Kelompok','Bimbingan Konseling Karir','Bimbingan Konseling Kelompok']);
            $table->unsignedBigInteger('tanggapan_guru_id')->nullable();
            $table->foreign('tanggapan_guru_id')->references('id')->on('users')->ondelete('cascade');
            $table->unsignedBigInteger('dibuat_oleh_id')->nullable();
            $table->foreign('dibuat_oleh_id')->references('id')->on('users');
            $table->timestamps();
        });

        Schema::create('bk_siswa', function(Blueprint $table){
            $table->increments('id');
            $table->string('nama_siswa')->nullable();
            $table->string('kelas')->nullable();
            $table->unsignedBigInteger('bk_siswa_id')->nullable();
            $table->foreign('bk_siswa_id')->references('id')->on('format_bk')->ondelete('cascade');
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
        Schema::dropIfExists('bk_siswa');
        Schema::dropIfExists('format_bk');
    }
}
