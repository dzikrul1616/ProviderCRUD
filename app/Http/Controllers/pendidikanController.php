<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pendidikan;

class pendidikanController extends Controller
{
    public function getPendidikan()
    {
        $pendidikan = Pendidikan::all();
        return response()->json([
            'status' => 'success',
            'data' => $pendidikan,
        ], 200);
    }
}
