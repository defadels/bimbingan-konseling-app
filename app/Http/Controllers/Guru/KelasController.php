<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Kelas;
use Validator;
use App\User;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_kelas = Kelas::get();

        return view('guru.kelas.index',compact('daftar_kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = 'guru.kelas.store';

        $button = 'Simpan';

        return view('guru.kelas.form',compact('url','button'));
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
            'nama' => 'required',
            'keterangan' => 'max:300'
        ];

        $message = [
            'nama.required' => 'Nama kelas harus diisi',
            'keterangan.max' => 'Keterangan batas maksimal 300 karakter'
        ];

        $validates = Validator::make($input,$rules,$message)->validate();

        $kelas = Kelas::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('guru.kelas')
        ->with('message',__('pesan.create',['module'=>$kelas->nama]));
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
    public function edit(Kelas $kelas)
    {
        $url = 'guru.kelas.update';

        $button = "Update";

        return view('guru.kelas.form',compact('url','button','kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        $input = $request->all();

        $rules = [
            'nama' => 'required',
            'keterangan' => 'max:300'
        ];

        $message = [
            'nama.required' => 'Nama kelas harus diisi',
            'keterangan.max' => 'Keterangan batas maksimal 300 karakter'
        ];

        $validates = Validator::make($input,$rules,$message)->validate();

        $kelas->nama = $request->nama;
        $kelas->keterangan = $request->keterangan;

        $kelas->save();

        return redirect()->route('guru.kelas')
        ->with('message',__('pesan.update',['module' => $kelas->nama]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        try{
            $nama = $kelas->nama;

            $kelas->delete();
        }catch(Exception $e){
            return redirect()->route('guru.kelas')
            ->with('error',__('pesan.error',['module'=>$nama]));
        }
        return redirect()->route('guru.kelas')
        ->with('message',__('pesan.delete',['module'=>$nama]));
    }
}
