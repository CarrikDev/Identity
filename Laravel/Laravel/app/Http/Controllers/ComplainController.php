<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use App\Models\Feedback;

class ComplainController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with(['user', 'category'])
            ->latest()
            ->get();

        return view('admin.list_aspirasi', compact('complaints'));
    }

    public function history()
    {
        $complaints = Complaint::All();

        return view('admin.history', compact('complaints'));
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai',
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update([
            'status' => $request->status
        ]);

        return redirect()->route('admin.list_aspirasi')->with('success', 'Status pengaduan berhasil diperbarui!');
    }

    public function feedback(Request $request, $id)
    {
        $request->validate([
            'feedback' => 'required|string|max:1000',
        ]);

        // 1. Cek apakah aspirasinya ada
        $complaint = Complaint::findOrFail($id);

        // 2. Simpan atau Update data ke tabel feedback secara langsung
        // Kita cari apakah sudah ada feedback untuk complaint_id ini
        Feedback::updateOrCreate(
            ['complaint_id' => $id], // Cari data berdasarkan kolom ini
            ['message' => $request->feedback] // Simpan input form 'feedback' ke kolom 'message'
        );

        return redirect()->route('admin.list_aspirasi')->with('success', 'Feedback berhasil disimpan!');
    }

    public function reject($id)
    {
        // 1. Ambil complaint
        $complaint = Complaint::findOrFail($id);
    
        // 2. Update status complaint
        $complaint->update([
            'status' => 'selesai'
        ]);
    
        // 3. Simpan / update feedback (TABEL TERPISAH)
        Feedback::updateOrCreate(
            ['complaint_id' => $id],
            ['message' => 'Aduan anda telah di selesaikan atau tidak ditemukan masalah pada aduan!']
        );
    
        return redirect()
            ->route('admin.list_aspirasi')
            ->with('success', 'Aduan berhasil direject dan ditandai selesai.');
    }
}
