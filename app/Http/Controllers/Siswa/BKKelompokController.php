<?php

namespace App\Http\Controllers\Siswa;

use Str;
use Auth;
use App\User;
use App\Kelas;
use Validator;
use App\LayananBK;
use App\BKSiswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BKKelompokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_bk = LayananBK::where('jenis','Bimbingan Konseling Kelompok')->where('dibuat_oleh_id', Auth::user()->id)->get();

        

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

        $daftar_siswa = User::where('jenis','siswa')->get();

        $url = 'siswa.bimbingan.kelompok.store';

        return view('siswa.bimbingan.kelompok.form',compact('button','url','daftar_siswa'));
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

        // dd($input);

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

        $nomorBK = 'BK/'.$sekarang->format('ymd').'/'.'KONSELING-KELOMPOK/'.Str::upper(Str::random(4));
        
        $data_bk = new LayananBK;
        $data_bk->nomor_bk = $request->nomor_bk = $nomorBK;
        $data_bk->judul_bk = $input['judul_bk'];
        $data_bk->pokok_pembahasan = $input['pokok_pembahasan'];
        $data_bk->status = 'Belum Ditanggapi';
        $data_bk->jenis = 'Konseling Kelompok';
        $data_bk->dibuat_oleh_id = Auth::user()->id;
        $data_bk->save();

        
        // $data_siswa = new BKSiswa;
        // $data_siswa->nama_siswa = $input['nama_siswa'];
        // $data_siswa->kelas = $input['kelas'];
        // $data_siswa->bk_siswa_id = $data_bk->id;
        // $data_siswa->save();

        // $nama_siswa = $request->nama_siswa;
        // $kelas = $request->kelas;
        // $bk_siswa_id = $data_bk->id;

        if($input['kelas'] > 0){
            foreach($input['kelas'] as $item => $value){
                $input2 = array(
                    'bk_siswa_id'=> $data_bk->id,
                    'nama_siswa' => $input['nama_siswa'][$item],
                    'kelas' => $input['kelas'][$item],
                );
                BKSiswa::create($input2);
            }
        }
        
        // for($i = 0; $i = count($nama_siswa); $i++){
        //     $datasave = [
        //         'bk_siswa_id' => $bk_siswa_id,
        //         'nama_siswa' => $nama_siswa[$i],
        //         'kelas' => $kelas[$i],
        //     ];
        //    DB::table('bk_siswa')->insert($datasave);
        // }

        return redirect()->route('siswa.bimbingan.kelompok')
        ->with('message',__('pesan.create',['module' => $data_bk->judul_tanggapan]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LayananBK $data_bk)
    {
        $daftar_siswa = BKSiswa::where('bk_siswa_id',$data_bk->id)->get();

        // dd($daftar_siswa);

        return view('siswa.bimbingan.kelompok.show',compact('data_bk','daftar_siswa'));
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
