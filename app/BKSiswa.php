<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BKSiswa extends Model
{
    protected $table = 'bk_siswa';

    protected $guarded = [];

    protected $fillable = ['nama_siswa','kelas','bk_siswa_id'];

    public function format_bk(){
        return $this->belongsTo('App\LayananBK', 'bk_siswa_id')->withDefault();
    }
}
