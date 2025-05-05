<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel customers
        $customers = Customer::all();  // Menampilkan data customers dari database

        // Mengirim data ke view 'customers'
        return view('customer', compact('customers'));
    }
}