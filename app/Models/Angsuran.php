<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
    use HasFactory;

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    protected $table = 'angsuran';

    protected $primaryKey = 'id';

    protected $fillable = [
        'peminjaman_id',
        'cicilan_terbayar',
    ];

}
