<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Akun;

class AkunController extends Controller
{
    /**
     * Simpan data akun baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi data dari form
        $validatedData = $request->validate([
            'username' => 'required|unique:akun|max:255',
            'password' => 'required',
        ]);
    
        // Simpan data ke database menggunakan model Akun
        \App\Models\Akun::create([
            'username' => $validatedData['username'],
            'password' => $validatedData['password'],  // Menghilangkan proses hashing
        ]);
    
        // Redirect ke halaman home dengan pesan sukses
        return redirect('/home')->with('success', 'Akun berhasil dibuat!');
    }
}
