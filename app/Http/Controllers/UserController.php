<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pekerjaan;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('pekerjaan')->get();
        $result = [
            'message' => 'List users',
            'data' => $users
        ];
        return response()->json($result);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'phone' => 'required|numeric',
            'alamat' => 'required',
            'pendidikan' => 'required',
        ]);

        $user = User::create($validatedData);

        foreach($request->pekerjaan as $dataPekerjaan){
            $pekerjaan = new Pekerjaan();
            $pekerjaan->pekerjaan = $dataPekerjaan['pekerjaan'];
            $pekerjaan->waktu = $dataPekerjaan['waktu'];
            $pekerjaan->user_id = $user->id;
            $pekerjaan->save();
        }

        return response()->json([
            'message' => 'User berhasil ditambahkan',
            'data' => $user
        ], 200);      
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'phone' => 'required|numeric',
            'alamat' => 'required',
            'pendidikan' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->nama = $validatedData['nama'];
        $user->phone = $validatedData['phone'];
        $user->alamat = $validatedData['alamat'];
        $user->pendidikan = $validatedData['pendidikan'];
        $user->save();

        $user->pekerjaan()->delete();

        foreach ($request->pekerjaan as $dataPekerjaan) {
            $pekerjaan = new Pekerjaan();
            $pekerjaan->pekerjaan = $dataPekerjaan['pekerjaan'];
            $pekerjaan->waktu = $dataPekerjaan['waktu'];
            $pekerjaan->user_id = $user->id;
            $pekerjaan->save();
        }

        return response()->json([
            'message' => 'Data pengguna berhasil diperbarui',
            'data' => $user
        ], 200);
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
    public function getUserById($id)
    {
        $user = User::with('pekerjaan')->find($id);
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
}
