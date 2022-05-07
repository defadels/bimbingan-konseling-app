<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\LayananBK;
use App\User;
use App\Kelas;
use App\BKSiswa;
use Auth;
use Validator;
use Carbon\Carbon;

class BKController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_bk = LayananBK::where('status','Belum Ditanggapi')->get();
        
        return view('guru.bimbingan.masuk.index', compact('data_bk'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(LayananBK $bk)
    {
        return view('guru.bimbingan.masuk.show',compact('bk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LayananBK $bk)
    {   
        $url = 'guru.bimbingan.masuk.update';

        $button = 'Kirim Tanggapan';

        return view('guru.bimbingan.masuk.form',compact('bk','url','button'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LayananBK $bk)
    {
        $input = $request->all();

        $rules = [
            'judul_tanggapan' => 'required',
            'tanggapan'     => 'required',
        ];

        $message = [
            'judul_tanggapan.required' => 'Wajib diisi',
            'tanggapan.required' => 'Wajib diisi',
        ];

        $validates = Validator::make($input, $rules, $message)->validate();

        $bk->judul_tanggapan = $request->judul_tanggapan;
        $bk->tanggapan = $request->tanggapan;
        $bk->status = 'Sudah Ditanggapi';
        $bk->tanggapan_guru_id = Auth::user()->id;

        $bk->save();

        return redirect()->route('guru.bimbingan.ditanggapi')
        ->with('message',__('pesan.update',['module'=>$bk->nomor_bk]));
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
