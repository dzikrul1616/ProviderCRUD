<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BeritaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = Berita::all();
        if (!$beritas) {
            return response()->json(['message' => 'berita not found.'], 404);
        }
        return response()->json(['data' => $beritas]);
    }
    // public function all()
    // {
    //     $beritas = Berita::all();
    //     if (!$beritas) {
    //         return response()->json(['message' => 'berita not found.'], 404);
    //     }
    //     return response()->json(['data' => $beritas]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'photo' => 'nullable|file|mimes:docx,pdf,jpg,png,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs('public/photos', $file, $filename);
            $validatedData['photo'] = $filename;
        }

        $berita = Berita::create($validatedData);
        return response()->json(['data' => $berita]);
        // $berita = Berita::create($request->all());
        // return response()->json($berita, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::find($id);
        if (!$berita) {
            return response()->json(['message' => 'berita not found.'], 404);
        }
        return response()->json(['data' =>$berita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'photo' => 'nullable|file|mimes:docx,pdf,jpg,png,svg|max:2048',
        ]);

        // Update the Berita model with the validated data
        $berita->update($validatedData);

        // Handle photo file upload
        if ($request->hasFile('photo')) {
            // Delete the old photo file
            Storage::delete('public/photos/' . $berita->photo);

            // Store the new photo file
            $photoFile = $request->file('photo');
            $photoFilename = time() . '_' . $photoFile->getClientOriginalName();
            $photoFile->storeAs('public/photos', $photoFilename);

            // Update the Berita model with the new photo filename
            $berita->update(['photo' => $photoFilename]);
        }

        // Return the updated Berita model
        return response()->json(['data' => $berita]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Berita  $berita
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::find($id);

        if ($berita->photo) {
            Storage::delete('public/photos/' . $berita->photo);
        }

        $berita->delete();
        return response()->json(['message' => 'Berita deleted successfully']);
    }
}
