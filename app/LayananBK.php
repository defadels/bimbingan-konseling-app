<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LayananBK extends Model
{
    protected $table = 'format_bk';

    protected $guarded = [];

    public function daftar_siswa(){
        return $this->hasMany('App\BKSiswa', 'bk_siswa_id');
    }

    public function ditanggapi_oleh(){
        return $this->belongsTo('App\User','tanggapan_guru_id')->withDefault();
    }
}
