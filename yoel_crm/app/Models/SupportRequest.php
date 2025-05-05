<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportRequest extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'support_requests';

    // Relasi belongsTo ke tabel customers
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
