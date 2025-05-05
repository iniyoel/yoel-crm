<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $table = 'leads';

    protected $primaryKey = 'lead_id'; 

    protected $fillable = [
        'customers_id', 'nama_lead', 'email_lead', 'telepon_lead', 
        'tanggal_masuk', 'status_lead', 'produk_tertarik', 'alamat_lead'
    ];

    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
}
