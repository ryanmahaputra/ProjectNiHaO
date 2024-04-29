<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function uploadImage(Request $request)
    {
        $imageData = $request->input('image');
        // Proses gambar, misalnya simpan ke server atau kirim ke API computer vision
        // Lakukan sesuatu dengan $imageData, misalnya kirim ke API komputer vision
        return response()->json(['message' => 'Gambar berhasil diterima dan diproses'], 200);
    }
}
