<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'original_filename',
        'stored_filename',
        'file_path',
        'file_mime_type',
        'file_size',
        'description',
    ];

    // Relasi: Sebuah dokumen dimiliki oleh satu user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}