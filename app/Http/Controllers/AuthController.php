<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Http;
class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function getInstansi()
    {
        $response = HTTP::get('https://api.ahmfarisi.com/perguruantinggi/');
        $bodyJson = $response->json('data');
        return response()->json($bodyJson);
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
        $validatedData = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5',
            'no_hp' => 'required|numeric',
        ],[
            'nama_lengkap.required' => 'Form nama lengkap wajib diisi !',

            'email.unique' => 'Email telah terdaftar, gunakan email lainnya',
            'email.required' => 'Form email wajib diisi !',
            'email.email' => 'Format email salah',

            'password.min' => 'Password minimal 5 karakter',
            'password.required' => 'Form Password wajib diisi !',

            'no_hp.required' => 'Form nomor hp wajib diisi !',
            'no_hp.numeric' => 'Inputan wajib berupa angka',
        ]);

        $user = new User();
        $user->name = $request->nama_lengkap;
        $user->phone = $request->no_hp;
        $user->email_verified_at = '0';
        $user->role = 'user';
        $user->verified = '0';
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $result = [
            'success' => true,
            'data' => $user,
            'message' => 'Berhasil'
        ];
        return response()->json($result, 200);
    }

    public function auth(Request $request)
     {
         $phone = $request->input('phone');
         $password = $request->input('password');

         $credentials = [
             'phone' => $phone,
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
               $user = User::where('phone', $phone)->first();
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
                       'message' => 'Phone atau password salah'
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
