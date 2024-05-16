<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'otp';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nomor',
        'otp',
        'waktu',
    ];

    // Menonaktifkan timestamps (created_at dan updated_at)
    public $timestamps = false;
}