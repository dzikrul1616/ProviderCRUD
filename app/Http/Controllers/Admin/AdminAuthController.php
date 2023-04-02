<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Admin;
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
                'email' => 'required|string|email|unique:admins|max:255',
                'password' => 'required|string|min:8',
                'role' => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }

        $admin = new Admin();
        $admin->name = $validatedData['name'];
        $admin->email = $validatedData['email'];
        $admin->password = Hash::make($validatedData['password']);
        $admin->role = $validatedData['role'];
        $admin->save();

        return response()->json([
            'admin' => $admin,
            'token' => $admin->createToken('Admin Access Token')->accessToken
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
            return response()->json(['message' => 'Invalid input data.', 'errors' => $validator->errors()], 422);
        }

        $credentials = $request->only('email', 'password');

        // if (!Auth::guard('admin')->attempt($credentials)) {
        //     throw ValidationException::withMessages([
        //         'email' => 'Invalid login credentials.',
        //     ]);
        // }

        $admin = Admin::where('email', $request->email)->firstOrFail();
        if (!$admin) {
            return response()->json(['message' => 'Admin not found.'], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'login success',
            'data' => $admin,
            'token' => $admin->createToken('Admin Access Token')->accessToken
        ]);
    }
    /**
     * Admin logout
     */
    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();

        if (!$user) {
            throw ValidationException::withMessages([
                'message' => 'Unauthorized.',
            ]);
        }

        $accessToken = $request->bearerToken();

        if (!$accessToken) {
            throw ValidationException::withMessages([
                'message' => 'Invalid access token.',
            ]);
        }

        $user->tokens()->where('id', $accessToken)->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'You have been logged out.']);
    }
}
