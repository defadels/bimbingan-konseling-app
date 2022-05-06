<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LayananBK;
use Auth;
use App\User;
use App\Kelas;
use Str;
use Validator;

class BKKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_bk = LayananBK::get();

        return view('siswa.bimbingan.kelompok.index',compact('data_bk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $button = "Kirim";

        $url = 'siswa.bimbingan.kelompok.store';

        return view('siswa.bimbingan.kelompok.form',compact('button','url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function cari_siswa(Request $request) {
        $selain = explode(',', urldecode($request->selain));
        $key = $request->cari;

        if($request->has("cari") && $request->cari != "")
        {
            $daftar_siswa = User::where('nama', 'like', '%'. $request->cari . '%')->whereNotIn('id', $selain)->paginate(5);
        } else {
            $daftar_siswa = User::whereNotIn('id', $selain)->paginate(5);
        }

        $results = array(
            "results" => $daftar_siswa->toArray()['data'],
            "pagination" => array(
                "more" => $daftar_siswa->hasMorePages()
            )
        );

        return response()->json($results);
    }

    public function json_daftar_kelas(Request $req) {

        $id_kelas = $req->kelas_id;
        $alamat = User::findOrFail($id_kelas)->pilihan_kelas()->get(); 
        
        $hasil = array(
            'result' => $kelas
        );
      
       return response()->json($hasil);
    }

    public function kelas(Request $request){
        $id_kelas = $request->id_kelas;

        $kelas = User::where('id', $id_kelas)->value('nama');

        return response()->json($kelas);
    }

}
