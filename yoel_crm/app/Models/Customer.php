<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda
    protected $table = 'customers';

    // Tentukan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'name', 'customer_email', 'phone_number', 'address', 'status', 'subscription_plan', 'next_billing_date', 'payment_amount'
    ];

    // Tentukan kolom primary key jika berbeda dari 'id'
    protected $primaryKey = 'customer_id'; // Gantilah dengan nama kolom primary key yang benar

    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}