<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Str;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_guru = User::where('jenis','guru')->get();

        $status= [
            'aktif' => 'Aktif',
            'nonaktif' => 'Nonaktif'
        ];

        return view('guru.guru.index',compact('daftar_guru', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = 'guru.guru.store';

        $button = 'Simpan';

        return view('guru.guru.form',compact('url','button'));
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
            'nip' => ['max:20','unique:users,nip'],
            'email' => ['required','unique:users,email'],
            'password' => ['required'],
            'mapel' => ['required'],
            'alamat' => ['max:50'],
            'nomor_hp' => ['regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13']
            
        ];

        $message = [
            'nama.required' => 'Nama kelas harus diisi',
            'nip.max' => 'NIP maksimal 20 karakter',
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
            'mapel.required' => 'Mata pelajaran harus diisi',
            'alamat.max' => 'Alamat batas maksimal 300 karakter',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016'
        ];

        $validates = Validator::make($input,$rules,$message)->validate();

        $guru = User::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'mapel' => $request->mapel,
            'nomor_hp' => $request->nomor_hp,
            'status' => 'aktif',
            'jenis' => 'guru'
        ]);

        return redirect()->route('guru.guru')
        ->with('message',__('pesan.create',['module'=>$guru->nama]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $guru)
    {
        $url = 'guru.guru.update';

        $button = "Update";

        return view('guru.guru.form',compact('guru','url','button'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $guru)
    {
        $input = $request->all();

        $rules = [
            'nama' => ['required'],
            'nip' => ['max:20','unique:users,nip,'.$guru->id],
            'email' => ['required','unique:users,email,'.$guru->id],
            'mapel' => ['required'],
            'alamat' => ['max:50'],
            'nomor_hp' => ['regex:/^(^\+628\s?|^08)(\d{3,4}?){2}\d{2,4}$/','max:13']
            
        ];

        $message = [
            'nama.required' => 'Nama kelas harus diisi',
            'nip.max' => 'NIP maksimal 20 karakter',
            'email.required' => 'Email harus diisi',
            'mapel.required' => 'Mata pelajaran harus diisi',
            'alamat.max' => 'Alamat batas maksimal 300 karakter',
            'nomor_hp.max' => 'Nomor handphone maksimal 13 digit',
            'nomor_hp.regex' => 'Format nomor handphone salah. Contoh: 082273318016'
        ];

        $validates = Validator::make($input,$rules,$message)->validate();

        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->email = $request->email;
        if ($request->has('password') && $request->password != ''){
            $guru->password = Hash::make($request->password);
        }
        $guru->mapel = $request->mapel;
        $guru->alamat = $request->alamat;
        $guru->nomor_hp = $request->nomor_hp;

        $guru->save();

        return redirect()->route('guru.guru')
        ->with('message',__('pesan.update',['module'=>$guru->nama]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $guru)
    {
        try{
            $nama = $guru->nama;

            $guru->delete();
        }catch(Exception $e){
            return redirect()->route('guru.guru')
            ->with('error',__('pesan.error',['module'=>$nama]));
        }
            return redirect()->route('guru.guru')
            ->with('message',__('pesan.delete',['module'=>$nama]));
    }
}
