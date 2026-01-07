<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

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
        return view('home');
    }

    public function data_siswa()
    {
        $data = Siswa::all();
        return view('admin.data_siswa', compact('data'));
    }
    
    public function input_data_siswa()
    {
        return view('admin.input_data_siswa');
    }
}
