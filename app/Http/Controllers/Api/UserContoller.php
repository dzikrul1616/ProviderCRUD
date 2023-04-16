<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\users;
use Google_Client;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;
use Google_Service_Oauth2;


use function PHPUnit\Framework\fileExists;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::select(
            'id',
            'name',
            'email',
            'email_verified_at',
            'institution',
            'phone',
            'transport',
            'photo',
            'sppd',
            'ktm',
            'transfer',
            'created_at',
            'updated_at'
        )
            ->get();
        return response()->json([
            'status' => 'success',
            'message' => 'All User',
            'data' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->ekstract();
        return response()->json([
            'status' => 'success',
            'message' => 'User profile',
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'institution' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'transport' => 'required|string|max:255',
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'sppd' => 'mimes:pdf|max:2048',
                'ktm' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'transfer' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'role' => 'required|numeric'
            ],
        );
        // Upload file
        $photo = $request->file('photo');
        $sppd = $request->file('sppd');
        $ktm = $request->file('ktm');
        $transfer = $request->file('transfer');
        // check empty
        if (isset($photo)) {
            $photoName = "Photo-" . $request->user()->id . "-" . time() . '.' . $photo->extension();
            $photo->move(public_path('images'), $photoName);
            $user->photo = $photoName;
        }
        if (isset($sppd)) {
            $sppdName = "SPPD-" . $user->id . "-" . time() . '.' . $sppd->extension();
            $sppd->move(public_path('images'), $sppdName);
            $user->sppd = $sppdName;
        }
        if (isset($ktm)) {
            $ktmName = "KTM-" . $user->id . "-" . time() . '.' . $ktm->extension();
            $ktm->move(public_path('images'), $ktmName);
            $user->ktm = $ktmName;
        }
        if (isset($transfer)) {
            $transferName = "Transfer-" . $user->id . "-" . time() . '.' . $transfer->extension();
            $transfer->move(public_path('images'), $transferName);
            $user->transfer = $transferName;
        }
        try {
            $user->name = $request->name;
            $user->institution = $request->institution;
            $user->phone = $request->phone;
            $user->transport = $request->transport;
            $user->role = $request->role;
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' => 'User updated',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not updated',
                'data' => $th
            ]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'User deleted',
                'data' => $user
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not deleted',
                'data' => $th
            ]);
        }
    }

    public function redirectToGoogle()
    {
      return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(Request $request)
     {
    try{
      $user = Socialite::driver('google')->user();
      $finduser = User::where('google_id', $user->id)->first();
      if ($finduser) {

        Auth::login($finduser);
        return redirect()->intended('http://localhost:8080/validasi');
      }else{
        // $payload = [
        //     'sub' => $user->id,
        //     'iat' => time(),
        //     'exp' => time() + 3600 // Token akan berlaku selama 1 jam
        // ];
        // $jwt = JWT::encode($payload, env('JWT_SECRET'));
        // dd($jwt);
        $newUser = User::create([
          'name' => $user->name,
          'email' => $user->email,
          'google_id' => $user->id,
          'role' => '0',
          'remember_token' => $token,
          'password' => $user->password
        ]);
        Auth::login($newUser);

        return redirect()->intended('http://localhost:8080/validasi');
      }
    }   catch (Exception $e)
        {
         dd($e->getMessage());
        }
    }
    public function verif(Request $request)
    {
        $token = $request->bearerToken();
        $CLIENT_ID = "442598779711-ll76cokdahv4v9ps6aua7ha4i1mabuqp.apps.googleusercontent.com";
        $client = new Google_Client(['client_id' => $CLIENT_ID]);
        $payload = $client->verifyIdToken($token);
        if ($payload) {
            $user = User::select("id", "name", "email", "role", "created_at", "updated_at")
                ->where('email', $payload['email'])
                ->first();
            if ($user) {
                Auth::attempt(['email' => $payload['email'], 'password' => 'password']);
                return response()->json([
                    'status' => 'success',
                    'message' => 'User exist',
                    'data' => $user,
                    'token' => $user->createToken('authToken')->plainTextToken
                ]);
            } else {
                $user = User::create([
                    'id' => $payload['sub'],
                    'name' => $payload['name'],
                    'email' => $payload['email'],
                    'email_verified_at' => now(),
                    'password' => bcrypt('password'),
                    'role' => 0
                ]);
                Auth::attempt(['email' => $payload['email'], 'password' => 'password']);
                return response()->json([
                    'status' => 'success',
                    'message' => 'User created',
                    'data' => $user,
                    'token' => $user->createToken('authToken')->plainTextToken
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid ID token'
            ]);
        }
    }
    public function register(Request $request, User $users)
    {
        return $this->hasMany(Absensi::class);
        $users = User::find($request->user()->id);
        $request->validate([
            'name' => 'required',
            'institution' => 'required',
            'phone' => 'required|numeric',
            'transport' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sppd' => 'required|mimes:pdf|max:2048',
            'ktm' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'transfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Upload file
        $photo = $request->file('photo');
        $sppd = $request->file('sppd');
        $ktm = $request->file('ktm');
        $transfer = $request->file('transfer');
        $photoName = "Photo-" . $request->user()->id . "-" . time() . '.' . $photo->extension();
        $sppdName = "SPPD-" . $request->user()->id . "-" . time() . '.' . $sppd->extension();
        $ktmName = "KTM-" . $request->user()->id . "-" . time() . '.' . $ktm->extension();
        $transferName = "Transfer-" . $request->user()->id . "-" . time() . '.' . $transfer->extension();
        $photo->move(public_path('images'), $photoName);
        $sppd->move(public_path('images'), $sppdName);
        $ktm->move(public_path('images'), $ktmName);
        $transfer->move(public_path('images'), $transferName);
        // remove old file
        if (file_exists(public_path('images/' . $users->photo)) && $users->photo) {
            unlink(public_path('images/' . $users->photo));
        }
        if (file_exists(public_path('images/' . $users->sppd)) && $users->sppd) {
            unlink(public_path('images/' . $users->sppd));
        }
        if (file_exists(public_path('images/' . $users->ktm)) && $users->ktm) {
            unlink(public_path('images/' . $users->ktm));
        }
        if (file_exists(public_path('images/' . $users->transfer)) && $users->transfer) {
            unlink(public_path('images/' . $users->transfer));
        }
        // Update user
        try {
            $request->user()->update([
                'name' => $request->name,
                'institution' => $request->institution,
                'phone' => $request->phone,
                'transport' => $request->transport,
                'photo' => $photoName,
                'sppd' => $sppdName,
                'ktm' => $ktmName,
                'transfer' => $transferName,
                'role' => 1
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User updated',
                'data' => $request->user()
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not updated',
                'data' => $th
            ]);
        }
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User logout'
        ],200);
    }
    public function update_penjemputan(Request $request, $id)
    {
      $penjemput = $request->input('penjemput');
      $lo = $request->input('lo');
      $wa1 = $request->input('wa1');
      $wa2 = $request->input('wa2');
      $ig1 = $request->input('ig1');
      $ig2 = $request->input('ig2');
      $kloter = $request->input('kloter');

      DB::table('users')
      ->where('id', $id)
      ->update([
        'penjemput' => $penjemput,
        'lo' => $lo,
        'linkig1' => $ig1,
        'linkig2' => $ig2,
        'wa1' => $wa1,
        'wa2' => $wa2,
        'klotter' => $kloter,
    ]);
    return response()->json([
        'status' => 'success',
        'message' => 'Data Berhasil Di Update'
    ]);
    }
    public function update_verified(Request $request, $id)
    {
      $verified = $request->input('verified');

      DB::table('users')
      ->where('id', $id)
      ->update([
        'verified' => $verified,
    ]);
    return response()->json([
        'status' => 'success',
        'message' => 'User Berhasil di verifikasi'
    ]);
    }
}
