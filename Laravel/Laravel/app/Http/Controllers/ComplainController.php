<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplainController extends Controller
{
    public function index()
    {
        $complaints = Complaint::with(['user', 'category'])
            ->latest()
            ->get();

        return view('admin.list_aspirasi', compact('complaints'));
    }
}
