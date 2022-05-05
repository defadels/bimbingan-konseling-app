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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('nis')->unique();
            $table->string('nip')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('status', ['aktif','nonaktif'])->default('aktif');
            $table->enum('agama', ['islam','kristen','protestan','hindu','buddha','khonghucu']);
            $table->enum('jenis', ['siswa','guru'])->default('siswa');
            $table->string('mapel')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->longText('alamat')->nullable();
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
    }
}
