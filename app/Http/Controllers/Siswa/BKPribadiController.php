<?php

namespace App\Http\Controllers\Siswa;

use Str;
use Auth;
use App\User;
use App\Kelas;
use Validator;
use App\BKSiswa;
use App\LayananBK;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use App\Http\Controllers\Controller;

class BKPribadiController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $id_user = Auth::user()->id;
        $data_bk = LayananBK::where('dibuat_oleh_id', $id_user)->where('jenis','Konseling Pribadi')->get();

        return view('siswa.bimbingan.pribadi.index',compact('data_bk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $button = "Kirim";

        $url = 'siswa.bimbingan.pribadi.store';

        return view('siswa.bimbingan.pribadi.form',compact('button','url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $rules = [
            'judul_bk' => 'required',
            'pokok_pembahasan' => 'required'
        ];

        $message = [
            'judul_bk.required' => 'Judul harus dibuat',
            'pokok_pembahasan.required' => 'Pokok pembahasan harus dibuat',
        ];

        $validates = Validator::make($input, $rules, $message)->validate();

        $sekarang = Carbon::now();

        $nomorBK = 'BK/'.$sekarang->format('ymd').'/'.'PRIBADI/'.Str::upper(Str::random(4));


        $data_bk = new LayananBK;
        $data_bk->judul_bk = $request->judul_bk;
        $data_bk->nomor_bk = $request->nomor_bk = $nomorBK;
        $data_bk->pokok_pembahasan = $request->pokok_pembahasan;
        $data_bk->dibuat_oleh_id = Auth::user()->id;
        $data_bk->status = 'Belum Ditanggapi';
        $data_bk->jenis = 'Konseling Pribadi';
        $data_bk->save();

        $data_siswa = new BKSiswa;
        $data_siswa->nama_siswa = Auth::user()->nama;
        $data_siswa->kelas = Auth::user()->pilihan_kelas->nama;
        $data_siswa->bk_siswa_id = $data_bk->id;
        $data_siswa->save();

        return redirect()->route('siswa.bimbingan.pribadi')
        ->with('message',__('pesan.create',['module' => $data_bk->nomor_bk]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LayananBK $data_bk)
    {
        return view('siswa.bimbingan.pribadi.show',compact('data_bk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
