<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\User;

class PekerjaanController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pekerjaan' => 'required|numeric',
            'waktu' => 'required|date',
        ]);

        $pekerjaan = new Pekerjaan();
        $pekerjaan->id = $user->id;
        $pekerjaan->longitude = $validatedData['pekerjaan'];
        $pekerjaan->status = $validatedData['waktu'];
        $pekerjaan->save();

        return response()->json([
            'message' => 'Pekerjaan berhasil ditambahkan',
            'data' => $pekerjaan
        ], 201);
    }

    public function getId( $id)
    {
        $pekerjaan = Pekerjaan::where('id', $id)->get();
        return response()->json([
            'message' => 'Pekerjaan berhasil ditampilkan',
            'pekerjaan'=>$pekerjaan
        ], 200);
    }
    public function getall()
    {
        $pekerjaan = Pekerjaan::join('users', 'pekerjaan.id', '=', 'users.id')
        ->select('pekerjaan.*', 'users.name', 'users.email', 'users.photo')
        ->get();
        return response()->json([
            'status' => 'success',
            'data' => $pekerjaan,
        ]);
    }
    public function deletePekerjaan($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();

        return response()->json([
          'message' => 'Data berhasil dihapus!',
          'success' => true,
        ], 200);
    }
    public function getPekerjaByUserId($user_id)
    {
        $pekerjaan = Pekerjaan::where('user_id', $user_id)->get();
        if (!$pekerjaan->count()) {
            return response()->json(['success' => false, 'message' => 'User ID tidak ditemukan'], 404);
        }
        $result = [
            'success' => true,
            'data' => $pekerjaan,
            'message' => 'Berhasil mengambil data pekerjaan berdasarkan User ID'
        ];
        return response()->json($result, 200);
        if (!$pekerjaan) {
        return response()->json(['success' => false, 'message' => 'User ID tidak ditemukan'], 404);
        }
        $result = [
        'success' => true,
        'data' => $pekerjaan,
        'message' => 'Berhasil mengambil data pekerjaan berdasarkan User ID'
        ];
        return response()->json($result, 200);
    }
}
