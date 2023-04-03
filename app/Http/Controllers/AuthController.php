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

    public function getUserById($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'ID tidak ada'], 404);
        }
        $result = [
            'success' => true,
            'data' => $user,
            'message' => 'Berhasil Mengambil ID'
        ];
        return response()->json($result, 200);
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
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6|confirmed',
        // ]);
        
        $user = new User();
        $user->name = $request->nama_lengkap;
        $user->alergi = $request->alergi;
        if ($request->hasFile('foto_almamater')) {
            $request->validate([
                'foto_almamater' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
    
            $file = $request->file('foto_almamater');
            $path = $file->store('public/');
            $user->photo = basename($path);
            $url = url('storage/' . $path);
        }
        $user->institution = $request->asal_instansi;
        $user->phone = $request->no_hp;
        $user->transport = $request->transportasi;
        if (in_array($request->transportasi, ['Bis', 'Pesawat', 'Kereta Api'])) {
            $request->validate([
                'foto_tiket' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
            $file = $request->file('foto_tiket');
            if ($request->hasFile('foto_tiket')) {
                $request->validate([
                    'foto_tiket' => 'mimes:jpeg,jpg,png,pdf|max:2048',
                ]);
        
                $file = $request->file('foto_tiket');
                $path = $file->store('public/');
                $user->tiket = basename($path);
                $url = url('storage/' . $path);
              
            }
        } else {
            $user->tiket = '0';
        }
        if ($request->hasFile('sppd')) {
            $request->validate([
                'sppd' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
    
            $file = $request->file('sppd');
            $path = $file->store('public/');
            $user->sppd = basename($path);
            $url = url('storage/' . $path);
          
        }
        if ($request->hasFile('ktm')) {
            $request->validate([
                'ktm' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
    
            $file = $request->file('ktm');
            $path = $file->store('public/');
            $user->ktm = basename($path);
            $url = url('storage/' . $path);
          
        }
        if ($request->hasFile('bukti_pelunasan')) {
            $request->validate([
                'bukti_pelunasan' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
    
            $file = $request->file('bukti_pelunasan');
            $path = $file->store('public/');
            $user->transfer = basename($path);
            $url = url('storage/' . $path);
          
        }
        if ($request->hasFile('nota_kesepakatan')) {
            $request->validate([
                'nota_kesepakatan' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
    
            $file = $request->file('nota_kesepakatan');
            $path = $file->store('public/');
            $user->nota = basename($path);
            $url = url('storage/' . $path);
          
        }
        if ($request->hasFile('konfirmasi_kedatangan')) {
            $request->validate([
                'konfirmasi_kedatangan' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
    
            $file = $request->file('konfirmasi_kedatangan');
            $path = $file->store('public/');
            $user->konfirmasi = basename($path);
            $url = url('storage/' . $path);
          
        }

        if ($request->hasFile('surat_izin')) {
            $request->validate([
                'surat_izin' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);
    
            $file = $request->file('surat_izin');
            $path = $file->store('public/');
            $user->surat_izin =basename($path);
            $url = url('storage/' . $path);
    
        }
        $user->email_verified_at = '0';
        $user->role = 'user';
        $user->verified = '0';
        $user->penjemput = 'Belum tersedia';
        $user->lo = 'Belum tersedia';
        $user->linkig1 = '0';
        $user->linkig2 = '0';
        $user->wa1 = '0';
        $user->wa2 = '0';
        $user->klotter = 'Belum tersedia';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login');
    }

    // public function auth(Request $request)
    // {
        
    //   $credentials = $request->validate([
    //     'email' => ['required', 'email'],
    //     'password' => ['required'],
    //   ]);
    //   if (Auth::attempt($credentials)) {
    //     $request->session()->regenerate();
    //     return redirect()->intended('http://localhost:8080/halamanuser');
    //   }
    //   session()->flash('error', 'Login gagal email atau password salah!');
    //   return redirect('/login');

    // }

    public function auth(Request $request)
     {
         $email = $request->input('email');
         $password = $request->input('password');

         $credentials = [
             'email' => $email,
             'password' => $password,
         ];

         if (Auth::attempt($credentials)) {
             // Jika autentikasi berhasil, kirim respon dengan status 200 OK
              $user = Auth::user();
              $token = $user->createToken('token')->plainTextToken;
              return response()->json([
                 'status' => 'success',
                 'message' => 'Login berhasil',
                 'user' => $user,
                 'token' => $token
             ], 200);
           } else {
               // Jika autentikasi gagal, coba lagi dengan mengubah password menjadi terbcrypt
               $user = User::where('email', $email)->first();
               if ($user && \Hash::check($password, $user->password)) {
                   Auth::login($user);
                   return response()->json([
                    'status' => 'success',
                    'message' => 'Login berhasil',
                    'user' => $user,
                    'token' => $token
                   ], 200);
               } else {
                   // Jika autentikasi gagal lagi, kirim respon dengan status 401 Unauthorized
                   return response()->json([
                       'message' => 'Email atau password salah'
                   ], 401);
               }
           }
       }

    public function logout()
    {
        
    }
    public function deleteadmin($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
          'message' => 'Data berhasil dihapus!',
          'success' => true,
        ], 200);
    }
}
