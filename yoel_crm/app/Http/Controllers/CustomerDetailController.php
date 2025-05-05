<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerDetailController extends Controller
{
    // Menampilkan halaman detail customer
    public function index($customer_id)
    {
        // Ambil data customer berdasarkan ID
        $customer = Customer::find($customer_id);
        
        // Pastikan nama variabel yang digunakan dalam compact sesuai
        return view('customer-detail', compact('customer'));
    }

    // Mengupdate subscription plan untuk customer
    public function updateSubscription(Request $request, $id)
{
    // Validasi data yang dikirim
    $validatedData = $request->validate([
        'subscription_plan' => 'required|string|max:255'
    ]);

    $customer = Customer::find($id);

    if (!$customer) {
        return redirect()->route('customer.index')->with('error', 'Lead not found!');
    }

    $customer->update($validatedData);
    return view('customer-detail', compact('customer'));
}
}
