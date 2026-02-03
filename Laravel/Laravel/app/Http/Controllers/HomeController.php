<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Complaint;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.Home');
    }
    public function data_siswa()
    {
        $siswa = Siswa::all();
        return view('admin.data_siswa', compact('siswa'));
    }
    public function input_data()
    {
        return view('admin.input_data');
    }

    /**
     * Controller pengaduan
     */
    public function input_pengaduan()
    {
        $categories = Category::all();
        return view('admin.input_pengaduan', compact('categories'));
    }

    // Hapus parameter User $user jika Anda tidak mengirim ID user via URL
    public function store_pengaduan(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title'       => 'required|max:255',
            'description' => 'required',
        ]);

        Complaint::create([
            // Gunakan auth() untuk mengambil ID user yang sedang login
            'user_id'     => auth()->id(), 
            'category_id' => $request->category_id,
            'title'       => $request->title,
            'description' => $request->description,
            'status'      => 'baru',
        ]);

        return redirect()->route('admin.history')->with('success', 'Pengaduan berhasil dikirim!');
    }

      public function history_siswa()
    {
        $data = Complaint::where('user_id', auth()->id())->get();
        return view('admin.history', compact('data'));
    }

    public function store_siswa(request $request)
    {
    $request->validate([
      'nis' => 'required|unique:siswa,nis|max:20',
      'nama_siswa' => 'required|max:50',
      'kelas' => 'required|max:20',
      'nama_jurusan' => 'required|max:50',
    ]);
        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'nama_jurusan' => $request->nama_jurusan
        ]);
        return redirect()->route('data_siswa');
    }

    public function tes()
    {
        return view('admin.tes');
    }

    public function detail_aspirasi($id)
    {
        // Mengambil data aspirasi beserta relasi user dan kategori
        $aspirasi = Complaint::with(['user', 'category'])->findOrFail($id);

        return view('admin.Detail', compact('aspirasi'));
    }

    public function laporan_aspirasi()
    {
        $kategoris = Category::all();
        return view('admin.Laporan', compact('kategoris'));
    }
    public function list_aspirasi()
    {
        return view('admin.list_aspirasi');
    }
}
