<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table ='kelas';

    protected $guarded = [];
    
    public function daftar_siswa(){
        return $this->hasMany('App\User', 'kelas_id');
    }
}
