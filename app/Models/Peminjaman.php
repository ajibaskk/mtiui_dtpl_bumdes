<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    // Mendefinisikan relasi ke model Nasabah
    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'nasabah_id');
    }

    protected $table = 'peminjaman';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nasabah_id',
        'nama_usaha',
        'jenis_usaha',
        'deskripsi_usaha',
        'jumlah_pinjaman',
        'tenor',
        'bunga',
        'total_pinjaman',
        'angsuran',
        'status'
    ];
}
