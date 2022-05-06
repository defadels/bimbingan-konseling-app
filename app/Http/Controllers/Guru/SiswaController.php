<?php

namespace App\Http\Controllers\Guru;

use Str;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Kelas;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $daftar_siswa = User::where('jenis','siswa')->get(); 

       return view('guru.siswa.index',compact('daftar_siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = 'guru.siswa.store';

        $daftar_kelas = Kelas::pluck('nama','id');

        $button = 'Simpan';

        $jenis_kelamin =[
            'laki-laki' => 'Laki-laki',
            'perempuan' => 'Perempuan'
       ];

       $daftar_agama =[
            'islam' => 'Islam',
            'protestan' => 'Protestan',
            'kristen' => 'Kristen',
            'hindu' => 'Hindu',
            'buddha' => 'Buddha',
            'khonghucu' => 'Khonghucu'
       ];

        return view('guru.siswa.form',compact('url','button','jenis_kelamin','daftar_agama','daftar_kelas'));
        
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
            'nama' => ['required'],
            'nis' => ['max:20','unique:users,nis'],
            'email' => ['required','unique:users,email'],
            'password' => ['required'],
            'tempat_lahir' => ['required'],
            'alamat' => ['max:50'],
            'nomor_hp' => ['regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13']
            
        ];

        $message = [
            'nama.required' => 'Nama kelas harus diisi',
            'nis.max' => 'NIP maksimal 20 karakter',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'alamat.max' => 'Alamat batas maksimal 300 karakter',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016'
        ];

        $validates = Validator::make($input,$rules,$message)->validate();

        $siswa = User::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'nomor_hp' => $request->nomor_hp,
            'kelas_id' => $request->kelas_id,
            'status' => 'aktif',
            'jenis' => 'siswa',
        ]);

        return redirect()->route('guru.siswa')
        ->with('message',__('pesan.create',['module'=>$siswa->nama]));
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
    public function edit(User $siswa)
    {
        $url = 'guru.siswa.update';

        $button = 'Update';

        $daftar_kelas = Kelas::pluck('nama','id');

        $jenis_kelamin =[
            'laki-laki' => 'Laki-laki',
            'perempuan' => 'Perempuan'
       ];

       $daftar_agama =[
            'islam' => 'Islam',
            'protestan' => 'Protestan',
            'kristen' => 'Kristen',
            'hindu' => 'Hindu',
            'buddha' => 'Buddha',
            'khonghucu' => 'Khonghucu'
       ];

        return view('guru.siswa.form',compact('url',
        'button','jenis_kelamin','daftar_agama','siswa','daftar_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $siswa)
    {
        $input = $request->all();

        $rules = [
            'nama' => ['required'],
            'nip' => ['max:20','unique:users,nip,'.$siswa->id],
            'email' => ['required','unique:users,email,'.$siswa->id],
            'tempat_lahir' => ['required'],
            'alamat' => ['max:50'],
            'nomor_hp' => ['regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13']
            
        ];

        $message = [
            'nama.required' => 'Nama kelas harus diisi',
            'nip.max' => 'NIP maksimal 20 karakter',
            'email.required' => 'Email harus diisi',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'alamat.max' => 'Alamat batas maksimal 300 karakter',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016'
        ];

        $validates = Validator::make($input,$rules,$message)->validate();

        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->email = $request->email;
        if ($request->has('password') && $request->password != ''){
            $siswa->password = Hash::make($request->password);
        }
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->alamat = $request->alamat;
        $siswa->nomor_hp = $request->nomor_hp;
        $siswa->kelas_id = $request->kelas_id;

        $siswa->save();

        return redirect()->route('guru.siswa')
        ->with('message',__('pesan.update',['module'=>$siswa->nama]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $siswa)
    {
        try{
            $nama = $siswa->nama;

            $siswa->delete();
        }catch(Exception $e){
            return redirect()->route('guru.siswa')
            ->with('error',__('pesan.error',['module'=>$nama]));
        }
            return redirect()->route('guru.siswa')
            ->with('message',__('pesan.delete',['module'=>$nama]));
    }
}
