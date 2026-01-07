<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.data_siswa');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.input_data_siswa');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|integer|unique:siswas,nis',
            'kelas' => 'required|string|max:10',
        ]);

        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas
        ]);

        return redirect('/data_siswa')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        // Kirim data siswa ke view edit
        return view('admin.edit_siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|integer|unique:siswas,nis,' . $siswa->id,
            'kelas' => 'required|string|max:10',
        ]);

        $siswa->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas
        ]);

        return redirect('/data_siswa')->with('success', 'Data siswa berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect('/data_siswa')->with('success', 'Siswa berhasil dihapus!');
    }
}
