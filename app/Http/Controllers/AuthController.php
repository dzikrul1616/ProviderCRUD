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
            'transportasi' => 'required',
            'foto_almamater' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'sppd' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'ktm' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'nota_kesepakatan' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'konfirmasi_kedatangan' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'pernyataan' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'surat_izin' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
            'bukti_pelunasan' => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
        ],[
            'nama_lengkap.required' => 'Form nama lengkap wajib diisi !',

            'email.unique' => 'Email telah terdaftar, gunakan email lainnya',
            'email.required' => 'Form email wajib diisi !',
            'email.email' => 'Format email salah',

            'password.min' => 'Password minimal 5 karakter',
            'password.required' => 'Form Password wajib diisi !',

            'no_hp.required' => 'Form nomor hp wajib diisi !',
            'no_hp.numeric' => 'Inputan wajib berupa angka',

            'transportasi.required' => 'Form transportasi wajib diisi !',

            'foto_almamater.required' => 'Form foto almamater wajib diisi !',
            'foto_almamater.mimes' => 'Format file tidak di dukung !',
            'foto_almamater.max' => 'File foto almamater tidak boleh lebih dari 2MB',

            'sppd.mimes' => 'Format file tidak di dukung !',
            'sppd.max' => 'File sppd tidak boleh lebih dari 2MB',
            'sppd.required' => 'Form sppd wajib diisi !',

            'ktm.mimes' => 'Format file tidak di dukung !',
            'ktm.max' => 'File ktm tidak boleh lebih dari 2MB',
            'ktm.required' => 'Form ktm wajib diisi !',

            'nota_kesepakatan.mimes' => 'Format file tidak di dukung !',
            'nota_kesepakatan.max' => 'File nota kesepakatan tidak boleh lebih dari 2MB',
            'nota_kesepakatan.required' => 'Form nota kesepakatan wajib diisi !',

            'konfirmasi_kedatangan.mimes' => 'Format file tidak di dukung !',
            'konfirmasi_kedatangan.max' => 'File konfirmasi kedatangan tidak boleh lebih dari 2MB',
            'konfirmasi_kedatangan.required' => 'Form konfirmasi kedatangan wajib diisi !',

            'pernyataan.mimes' => 'Format file tidak di dukung !',
            'pernyataan.max' => 'File pernyataan tidak boleh lebih dari 2MB',
            'pernyataan.required' => 'Form pernyataan wajib diisi !',

            'surat_izin.mimes' => 'Format file tidak di dukung !',
            'surat_izin.max' => 'File surat izin tidak boleh lebih dari 2MB',
            'surat_izin.required' => 'Form surat izin wajib diisi !',

            'bukti_pelunasan.mimes' => 'Format file tidak di dukung !',
            'bukti_pelunasan.max' => 'File bukti pelunasan tidak boleh lebih dari 2MB',
            'bukti_pelunasan.required' => 'Form bukti pelunasan wajib diisi !',

        ]);

        $user = new User();
        $user->name = $request->nama_lengkap;
        $user->alergi = $request->alergi;

        if ($request->hasFile('foto_almamater')) {
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

            $file = $request->file('sppd');
            $path = $file->store('public/');
            $user->sppd = basename($path);
            $url = url('storage/' . $path);

        }
        if ($request->hasFile('ktm')) {

            $file = $request->file('ktm');
            $path = $file->store('public/');
            $user->ktm = basename($path);
            $url = url('storage/' . $path);

        }
        if ($request->hasFile('bukti_pelunasan')) {
            $file = $request->file('bukti_pelunasan');
            $path = $file->store('public/');
            $user->transfer = basename($path);
            $url = url('storage/' . $path);

        }
        if ($request->hasFile('nota_kesepakatan')) {
            $file = $request->file('nota_kesepakatan');
            $path = $file->store('public/');
            $user->nota = basename($path);
            $url = url('storage/' . $path);

        }
        if ($request->hasFile('konfirmasi_kedatangan')) {
            $file = $request->file('konfirmasi_kedatangan');
            $path = $file->store('public/');
            $user->konfirmasi = basename($path);
            $url = url('storage/' . $path);

        }
        if ($request->hasFile('pernyataan')) {
            $file = $request->file('pernyataan');
            $path = $file->store('public/');
            $user->pernyataan = basename($path);
            $url = url('storage/' . $path);

        }

        if ($request->hasFile('surat_izin')) {
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

        return redirect('https://welcome.mukernasfornassosma.site/');
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
