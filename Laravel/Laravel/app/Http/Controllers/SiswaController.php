<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    // halaman input data
    public function create()
    {
        $jurusans = \App\Models\Jurusan::all();
        return view('admin.input_data', compact('jurusans'));
    }

    // simpan data dari form
    public function store_siswa(Request $request)
    {
        $request->validate([
            'nis'      => 'required',
            'nama'     => 'required|max:50',
            'kelas'    => 'required|max:20',
            'jurusan'  => 'required|max:20',
        ]);

        Siswa::create([
            'nis'        => $request->nis,
            'nama_siswa' => $request->nama,
            'kelas'      => $request->kelas,
            'jurusan'    => $request->jurusan,
        ]);

        return redirect()->route('data_siswa')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    // tampil data siswa
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.data_siswa', compact('siswa'));

    }
}
