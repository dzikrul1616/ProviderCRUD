<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Presensi;
use App\Models\User;

class PresensiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jarak' => 'required|numeric',
            'hari' => 'required|date',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required|in:hadir,diluar area'
        ]);

        $user = Auth::user();
        $presensi = new Presensi();
        $presensi->id = $user->id;
        $presensi->jarak = $validatedData['jarak'];
        $presensi->hari = $validatedData['hari'];
        $presensi->latitude = $validatedData['latitude'];
        $presensi->longitude = $validatedData['longitude'];
        $presensi->status = $validatedData['status'];
        $presensi->save();

        return response()->json([
            'message' => 'Presensi berhasil ditambahkan',
            'data' => $presensi
        ], 201);
    }

    public function getId( $id)
    {
        $presensi = Presensi::where('id', $id)->get();
        return response()->json([
            'message' => 'Presensi berhasil ditampilkan',
            'presensi'=>$presensi
        ], 200);
    }
    public function getall()
    {
        $presensi = Presensi::join('users', 'presensi.id', '=', 'users.id')
        ->select('presensi.*', 'users.name', 'users.email', 'users.photo')
        ->get();
        return response()->json([
            'status' => 'success',
            'data' => $presensi,

        ]);
    }
}
