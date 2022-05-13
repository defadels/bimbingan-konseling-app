<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('otentikasi.admin-register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function create(Request $request)
    {
        $input = $request->all();

        $rules = [
            'nip' => ['nullable','max:12', 'unique:users'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required',  'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ];

        $validate = Validator::make($input, $rules)->validate();

     $user = new User;

     $user->nip = $request['nip'];
     $user->nama = $request['nama'];
     $user->email = $request['email'];
     $user->password = Hash::make($request['password']);
     $user->jenis = 'guru';
     $user->save();


     $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
     ]);

      if(Auth::attempt($data)){
          $request->session()->regenerate();
          
          return redirect()->route('home');
      }  
            return redirect()->route('pintudepan');
    }
}
