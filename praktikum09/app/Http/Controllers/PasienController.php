<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = pasien::get();
        return view('pasien.index', compact('pasien'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek validasi
        $request->validate(
            [
                'kode' => 'required|string',
                'nama' => 'required|string',
                'tmp_lahir' => 'required|string',
                'tgl_lahir' => 'required|date',
                'gender' => 'required|string',
                'email' => 'required|string',
                'alamat' => 'required|string'
            ]);
        
            // kirim data ke database

            Pasien::create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'tmp_lahir' => $request->tmp_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'gender' => $request->gender,
                'email' => $request->email,
                'alamat' => $request->alamat
            ]);
            
            // redirect ke index

            return redirect()->route('pasiens.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        return view('pasien.show', compact('pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        // Pass the Pasien instance to the view
        return view('pasien.edit', compact('pasien'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {

       
        // Update data kecuali _token
        $data = $request->except('_token');

        // Update the Pasien instance
        $pasien->update($data);

        // Redirect to the index page with a success message
        return redirect()->route('pasiens.index')->with('success', 'Pasien updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        // hapus data

        $pasien->delete();
        
        // reedirect halaman
        
        return redirect()->route('pasiens.index');
    }
}
