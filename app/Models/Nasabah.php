<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    use HasFactory;

    protected $table = 'nasabah';

    protected $primaryKey = 'nasabah_id';

    protected $fillable = [
        'nik',
        'nama_lengkap',
        'alamat_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'jenis_pekerjaan',
        'rentang_penghasilan',
        'pendidikan_terakhir',
        'file_ktp_location',
    ];
}
