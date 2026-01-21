<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Models\Siswa;

class JurusanController extends Controller
{
    public function create()
    {
        return view('admin.input_data_jurusan');
    }

    public function insert_pengaduan()
    {
        $data = Siswa::all();
        return view('admin.form_pengaduan', compact('data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_jurusan' => 'required|string|max:10|unique:jurusan,kode_jurusan',
            'nama_jurusan' => 'required|string|max:255',
        ]);

        Jurusan::create($validatedData);

        return redirect('/data_jurusan')->with('success', 'Data jurusan berhasil ditambahkan!');
    }

    public function index()
    {
        $jurusan = Jurusan::all();
        return view('admin.data_jurusan', compact('jurusan'));
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.edit_data_jurusan', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'kode_jurusan' => 'required|string|max:10|unique:jurusan,kode_jurusan,' . $id,
            'nama_jurusan' => 'required|string|max:255',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($validatedData);

        return redirect('/data_jurusan')->with('success', 'Data jurusan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect('/data_jurusan')->with('success', 'Data jurusan berhasil dihapus!');
    }
}