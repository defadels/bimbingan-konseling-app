<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BuatTabelFormatBk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('format_bk',function(Blueprint $table){
            $table->id();
            $table->string('judul_bk')->nullable();
            $table->text('pokok_pembahasan')->nullable();
            $table->string('judul_tanggapan')->nullable();
            $table->text('tanggapan')->nullable();
            $table->enum('jenis',['pribadi','kelompok','karir','konseling_kelompok']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('format_bk');
    }
}
