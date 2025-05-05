<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerDetailController;
use App\Http\Controllers\LeadDetailController;



// Halaman untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Halaman Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Halaman Leads
Route::get('/leads', [LeadController::class, 'index']);

// Halaman Process Lead
Route::get('/process-lead/{id}', [LeadDetailController::class, 'index']);
Route::put('/process-leads/{lead}', [LeadDetailController::class, 'update'])->name('leads.update');

// Halaman Customer
Route::get('/customers', [CustomerController::class, 'index']);

// Halaman Customer Detail
Route::get('/customer-detail/{id}', [CustomerDetailController::class, 'index']);
Route::put('/customer-detail/{id}/update', [CustomerDetailController::class, 'updateSubscription'])->name('customers.update');

// Halaman Change Password
Route::get('/change-password', function () {
    return view('change-password');
});

// Halaman Verify Email
Route::get('/verify-email', function () {
    return view('verify-email');
});

// Halaman Products
Route::get('/products', function () {
    return view('products');
});
