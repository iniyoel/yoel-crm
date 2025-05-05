<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;

class LeadDetailController extends Controller
{
    // Menampilkan halaman lead dengan data berdasarkan ID
    public function index($id)
    {
        // Mengambil data lead berdasarkan ID
        $lead = Lead::find($id);  // Mengambil data dari tabel leads berdasarkan ID

        // Mengecek apakah data ditemukan
        if (!$lead) {
            return redirect()->route('leads')->with('error', 'Lead not found!');
        }

        // Mengirim data lead ke view
        return view('process-lead', compact('lead'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang dikirim
        $validatedData = $request->validate([
            'produk_tertarik' => 'required|string|max:255',
            'status_lead' => 'required|string|max:20',
        ]);

        // Temukan lead berdasarkan id
        $lead = Lead::find($id);

        // Pastikan data ditemukan
        if (!$lead) {
            return redirect()->route('leads.index')->with('error', 'Lead not found!');
        }

        // Update data lead dengan data yang diterima dari form
        $lead->update($validatedData);

        // Redirect atau kembali dengan pesan sukses
        return view('process-lead', compact('lead'));
    }
}
