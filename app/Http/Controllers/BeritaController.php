<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::get();
        return response()->json([
            'status' => 'success',
            'data' => $berita,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        $validate = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);


        $berita = new Berita();
        $berita->judul = $request->judul;
        $berita->deskripsi = $request->deskripsi;
        if ($request->hasFile('file')) {
            $request->validate([
                'file' => 'mimes:jpeg,jpg,png,pdf|max:2048',
            ]);

            $file = $request->file('file');
            $path = $file->store('public/');
            $berita->file = basename($path);
            $url = url('storage/' . $path);
        }
        $berita->save();

        return response()->json([
            'data' => $berita,
        ], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function edit(Berita $berita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Berita $berita)
    {
        // $request->validate([
        //     'judul' => 'required',
        //     'berita' => 'required',
        //     'file' => 'required',
        // ]);

        // $file = $request->file('file');
        // $path = $file->storeAs('berita', uniqid() . '.' . $file->extension(), ['disk' => 'public']);
        // $url = Storage::url($path);

        // $berita = Berita::create([
        //     'judul' => $request->judul,
        //     'berita' => $request->berita,
        //     'file' => $request->file
        // ]);

        // return response()->json([
        //     'data' => $berita,
        //     'link' => $url
        // ], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return response()->json([
          'message' => 'Data berhasil dihapus!',
          'success' => true,
        ], 200);
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
