<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\users;
use Google_Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function verif(Request $request)
    {
        // Verif user from token google auth and save to database

        // get bearer token from request
        $token = $request->bearerToken();

        $CLIENT_ID = "75508756988-36the29ri3spvg0fk7amr7cqn1k1qrl1.apps.googleusercontent.com";
        $client = new Google_Client(['client_id' => $CLIENT_ID]);
        $payload = $client->verifyIdToken($token);
        if ($payload) {
            // check if user exist
            $user = User::select("id", "name", "email", "role", "created_at", "updated_at")
                ->where('email', $payload['email'])
                ->first();
            if ($user) {
                // user exist
                Auth::attempt(['email' => $payload['email'], 'password' => 'password']);
                return response()->json([
                    'status' => 'success',
                    'message' => 'User exist',
                    'data' => $user,
                    'token' => $user->createToken('authToken')->plainTextToken
                ]);
            } else {
                // user not exist
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
            // Invalid ID token
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid ID token'
            ]);
        }
    }
    public function register(Request $request, User $users)
    {
        $users = User::find($request->user()->id);
        $request->validate([
            'name' => 'required',
            'institution' => 'required',
            'phone' => 'required|numeric',
            'transport' => 'required',
            'allergy' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sppd' => 'required|mimes:pdf|max:2048',
            'sksk' => 'required|mimes:pdf|max:2048',
            'ktm' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'transfer' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Upload file
        $photo = $request->file('photo');
        $sppd = $request->file('sppd');
        $sksk = $request->file('sksk');
        $ktm = $request->file('ktm');
        $transfer = $request->file('transfer');
        $photoName = "Photo-" . $request->user()->id . "-" . time() . '.' . $photo->extension();
        $sppdName = "SPPD-" . $request->user()->id . "-" . time() . '.' . $sppd->extension();
        $skskName = "sksk-" . $request->user()->id . "-" . time() . '.' . $sksk->extension();
        $ktmName = "KTM-" . $request->user()->id . "-" . time() . '.' . $ktm->extension();
        $transferName = "Transfer-" . $request->user()->id . "-" . time() . '.' . $transfer->extension();
        $photo->move(public_path('images'), $photoName);
        $sppd->move(public_path('images'), $sppdName);
        $sksk->move(public_path('images'), $skskName);
        $ktm->move(public_path('images'), $ktmName);
        $transfer->move(public_path('images'), $transferName);
        // remove old file
        if (file_exists(public_path('images/' . $users->photo)) && $users->photo) {
            unlink(public_path('images/' . $users->photo));
        }
        if (file_exists(public_path('images/' . $users->sppd)) && $users->sppd) {
            unlink(public_path('images/' . $users->sppd));
        }
        if (file_exists(public_path('images/' . $users->sksk)) && $users->sksk) {
            unlink(public_path('images/' . $users->sksk));
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
                'allergy' => $request->allergy,
                'photo' => $photoName,
                'sppd' => $sppdName,
                'sksk' => $skskName,
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
        ]);
    }
}
