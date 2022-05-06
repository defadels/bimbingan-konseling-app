<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('kelas', function(Blueprint $table){
            $table->increments('id');
            $table->string('nama')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('count')->nullable();
            $table->timestamps();
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nis')->unique()->nullable();
            $table->string('nip')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
            $table->enum('agama', ['islam','kristen','protestan','hindu','buddha','khonghucu']);
            $table->enum('jenis', ['siswa','guru']);
            $table->enum('jenis_kelamin', ['laki-laki','perempuan']);
            $table->string('mapel')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->longText('alamat')->nullable();
            $table->unsignedInteger('kelas_id')->nullable();
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('kelas');
    }
}
