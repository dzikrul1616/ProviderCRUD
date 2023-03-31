<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class AuthController extends Controller
{
    public function login() 
    {
        return view('auth.login');
    }

    public function register() 
    {
        return view('auth.register');
    }
    public function getUser()
    {
        $user = User::all();

        $result = [
            'success' => true,
            'data' => $user,
            'message' => 'Berhasil'
        ];
        return response()->json($result, 200);
    }

    public function storeRegister(Request $request) 
    {

        $newKonfirmasi = '';
        $newSuratIzin = '';
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6|confirmed',
        // ]);
        $user = new User();
        $user->name = $request->nama_lengkap;
        $user->alergi = $request->alergi;
        if($request->file('photo'))
        {
          $extension = $request->file('photo')->getClientOriginalExtension();
          $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('photo')->storeAs('img', $newName);
        }
        $user->photo = $request->foto_almamater;
        $user->institution = $request->asal_instansi;
        $user->phone = $request->no_hp;
        if($request->file('transport'))
        {
          $extension = $request->file('transport')->getClientOriginalExtension();
          $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('transport')->storeAs('img', $newName);
        }
        $user->transport = $request->transportasi;
        if($request->file('sppd'))
        {
          $extension = $request->file('sppd')->getClientOriginalExtension();
          $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('sppd')->storeAs('img', $newName);
        }
        $user->sppd = $request->sppd;
        if($request->file('ktm'))
        {
          $extension = $request->file('ktm')->getClientOriginalExtension();
          $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('ktm')->storeAs('img', $newName);
        }
        $user->ktm = $request->ktm;
        if($request->file('transfer'))
        {
          $extension = $request->file('transfer')->getClientOriginalExtension();
          $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('transfer')->storeAs('img', $newName);
        }
        $user->transfer = $request->bukti_pelunasan;
        if($request->file('nota'))
        {
          $extension = $request->file('nota')->getClientOriginalExtension();
          $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('nota')->storeAs('img', $newName);
        }
        $user->nota = $request->nota_kesepakatan;
        if($request->file('konfirmasi'))
        {
          $extension = $request->file('konfirmasi')->getClientOriginalExtension();
          $newKonfirmasi = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('konfirmasi')->storeAs('img', $newKonfirmasi);
        }
        $request['konfirmasi'] = $newKonfirmasi;

        if($request->file('surat_izin'))
        {
          $extension = $request->file('surat_izin')->getClientOriginalExtension();
          $newSuratIzin = $request->name.'-'.now()->timestamp.'.'.$extension;
          $request->file('surat_izin')->storeAs('img', $newSuratIzin);
        }
        $request['surat_izin'] = $newSuratIzin;

        $user->email_verified_at = '0';
        $user->role = 'user';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login');
    }

    public function auth(Request $request)
    {
        
      $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
      ]);
      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('http://localhost:8080/halamanuser');
      }
      session()->flash('error', 'Login gagal email atau password salah!');
      return redirect('/login');

    }

    public function logout()
    {

    }
}
