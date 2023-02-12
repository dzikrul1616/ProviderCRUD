<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::select(
            'name',
            'email',
            'email_verified_at',
            'institution',
            'phone',
            'transport',
            'photo',
            'sppd',
            'ktm',
            'transfer'
        )
            ->find($request->user()->id);
        return response()->json([
            'status' => 'success',
            'message' => 'User profile',
            'data' => $user
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
        $user = User::find($request->user()->id);
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
            if (file_exists(public_path('images/' . $user->photo)) && $user->photo) {
                unlink(public_path('images/' . $user->photo));
            }
            $request->user()->photo = $photoName;
        }
        if (isset($sppd)) {
            $sppdName = "SPPD-" . $request->user()->id . "-" . time() . '.' . $sppd->extension();
            $sppd->move(public_path('images'), $sppdName);
            if (file_exists(public_path('images/' . $user->sppd)) && $user->sppd) {
                unlink(public_path('images/' . $user->sppd));
            }
            $request->user()->sppd = $sppdName;
        }
        if (isset($ktm)) {
            $ktmName = "KTM-" . $request->user()->id . "-" . time() . '.' . $ktm->extension();
            $ktm->move(public_path('images'), $ktmName);
            if (file_exists(public_path('images/' . $user->ktm)) && $user->ktm) {
                unlink(public_path('images/' . $user->ktm));
            }
            $request->user()->ktm = $ktmName;
        }
        if (isset($transfer)) {
            $transferName = "Transfer-" . $request->user()->id . "-" . time() . '.' . $transfer->extension();
            $transfer->move(public_path('images'), $transferName);
            if (file_exists(public_path('images/' . $user->transfer)) && $user->transfer) {
                unlink(public_path('images/' . $user->transfer));
            }
            $request->user()->transfer = $transferName;
        }
        try {
            $request->user()->update([
                'name' => $request->name,
                'institution' => $request->institution,
                'phone' => $request->phone,
                'transport' => $request->transport,
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
