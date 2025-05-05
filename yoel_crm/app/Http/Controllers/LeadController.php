<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    // Menampilkan halaman leads dengan data dari database
    public function index()
    {
        // Mengambil data dari database
        $leads = Lead::all();  // Mengambil semua data dari tabel leads

        // Mengirim data leads ke view
        return view('leads', compact('leads'));
    }
}
