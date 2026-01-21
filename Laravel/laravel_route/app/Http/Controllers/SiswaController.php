<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();
        return view('admin.data_siswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('admin.input_data_siswa', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Data diterima dalam bentuk array:
        // $request->nama   = ['nama1', 'nama2', ...]
        // $request->nis    = ['nis1', 'nis2', ...]
        // $request->jurusan_id = [1, 2, ...]

        $validatedData = $request->validate([
            'nama.*'       => 'required|string|max:255',
            'nis.*'        => 'required|numeric|unique:siswas,nis',
            'kelas.*'      => 'required|string|max:50',
            'jurusan_id.*' => 'required|exists:jurusan,id', // Pastikan tabel jurusan sudah benar
        ]);
        
        // Loop untuk menyimpan setiap siswa
        foreach ($request->nama as $index => $nama) {
            Siswa::create([
                'nama'       => $nama,
                'nis'        => $request->nis[$index],
                'kelas'      => $request->kelas[$index],
                'jurusan_id' => $request->jurusan_id[$index],
                // Tambahkan field lain jika ada
            ]);
        }

        return redirect('/data_siswa')->with('success', 'Semua data siswa berhasil ditambahkan!');
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
        $jurusan = Jurusan::all();
        return view('admin.edit_siswa', compact('siswa', 'jurusan'));
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
            'jurusan_id' => 'required|exists:jurusan,id',
        ]);

        $siswa->update([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jurusan_id' => $request->jurusan_id,
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
