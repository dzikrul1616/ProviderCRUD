<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\User;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AdminAuthController extends Controller
{
    //
    public function register(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'noHp' => 'required|string|max:13|unique:users|regex:/^\d{10,13}$/',
                'alamat' => 'required|string|max:255',
                'pendidikan' => 'required|string|max:255',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
        
        $admin = new User();
        $admin->name = $validatedData['name'];
        $admin->noHp = $validatedData['noHp'];
        $admin->alamat = $validatedData['alamat'];
        $admin->pendidikan = $validatedData['pendidikan'];
        $admin->pekerjaan_id = $pekerjaan->id;
        $admin->save();
        
        $pekerjaan = new Pekerjaan();
        $pekerjaan->pekerjaan = $validatedData['pekerjaan'];
        $pekerjaan->tahun = $validatedData['tahun'];
        $pekerjaan->save();
        
        return response()->json([
            'users' => $admin,
        ]);
    }


    /**
     * Admin login function.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$data->errors()->all()], 400);
        }

        $credentials = $request->only('email', 'password');

        // if (!Auth::guard('admin')->attempt($credentials)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'Invalid login credentials.',
        //     ]);
        // }

        $admin = User::where('email', $request->email)->firstOrFail();
        if (!$admin) {
            return response()->json(['message' => 'Admin not found.'], 404);
        }
        $token = $admin->createToken('token')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'message' => 'login success',
            'data' => $admin,
            'token' => $token
        ]);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Admin logout
     */
    // public function logout(Request $request)
    // {
    //     $user = Auth::guard('api')->user();

    //     if (!$user) {
    //         throw ValidationException::withMessages([
    //             'message' => 'Unauthorized.',
    //         ]);
    //     }

    //     $accessToken = $request->bearerToken();

    //     if (!$accessToken) {
    //         throw ValidationException::withMessages([
    //             'message' => 'Invalid access token.',
    //         ]);
    //     }

    //     $user->tokens()->where('id', $accessToken)->delete();

    //     return response()->json([
    //         'status' => 'success',
    //         'message' => 'You have been logged out.']);
    // }
}

