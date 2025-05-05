<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        
        $leads = Lead::all();

        $productCounts = Customer::selectRaw('subscription_plan, count(*) as count')
            ->groupBy('subscription_plan')
            ->get();

        // Mengambil data untuk grafik garis (jumlah customer per bulan)
        $monthlyCustomers = Customer::selectRaw('MONTH(next_billing_date) as month, count(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Kirim data ke view
        return view('dashboard', compact('productCounts', 'monthlyCustomers', 'leads'));
    }
}
