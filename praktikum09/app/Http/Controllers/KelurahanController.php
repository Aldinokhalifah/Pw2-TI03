<?php

namespace App\Http\Controllers;

use App\Models\kelurahan;
use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelurahan = kelurahan::get();
        return view('kelurahan.index',compact('kelurahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelurahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi data
        $request->validate([
            'nama' => 'required|string',
            'kecamatan_id' => 'required|numeric'
        ]);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        //if valid data
        kelurahan::create([
            'nama' => $request->nama,
            'kecamatan_id' => $request->kecamatan_id
        ]);

        return redirect()->route('kelurahan.index')->with('success','kelurahan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(kelurahan $kelurahan)
    {
        return view('kelurahan.show',compact('kelurahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kelurahan $kelurahan)
    {
        return view('kelurahan.edit',compact('kelurahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kelurahan $kelurahan)
    {
         // Update data kecuali _token
         $data = $request->except('_token');

         // Update the Pasien instance
         $kelurahan->update($data);
 
         // Redirect to the index page with a success message
         return redirect()->route('kelurahan.index')->with('success', 'Kelurahan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kelurahan $kelurahan)
    {
        // hapus data

        $kelurahan->delete();
        
        // reedirect halaman
        
        return redirect()->route('kelurahan.index');
    }
}
