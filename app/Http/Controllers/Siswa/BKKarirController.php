<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LayananBK;
use App\User;
use App\Kelas;
use App\BKSiswa;
use Auth;
use Str;
use Validator;
use Carbon\Carbon;

class BKKarirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data_bk = LayananBK::where('jenis','karir')->get();

        return view('siswa.bimbingan.karir.index',compact('data_bk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $button = "Kirim";

        $url = 'siswa.bimbingan.karir.store';

        return view('siswa.bimbingan.karir.form',compact('button','url'));
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

        $nomorBK = 'BK/'.$sekarang->format('ymd').'/'.'KARIR/'.Str::upper(Str::random(4));

        $data_bk = new LayananBK;
        $data_bk->judul_bk = $request->judul_bk;
        $data_bk->nomor_bk = $request->nomor_bk = $nomorBK;
        $data_bk->pokok_pembahasan = $request->pokok_pembahasan;
        $data_bk->status = 'belum di tanggapi';
        $data_bk->jenis = 'karir';
        $data_bk->save();

        $data_siswa = new BKSiswa;
        $data_siswa->nama_siswa = Auth::user()->nama;
        $data_siswa->kelas = Auth::user()->pilihan_kelas->nama;
        $data_siswa->bk_siswa_id = $data_bk->id;
        $data_siswa->save();

        return redirect()->route('siswa.bimbingan.karir')
        ->with('message',__('pesan.create',['module' => $data_bk->nomor_bk]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
