<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBunga extends Model
{
    use HasFactory;

    protected $table = 'master_bungas';

    protected $primaryKey = 'master_bunga_id';

    protected $fillable = [
        'bunga',
        'waktu_angsuran',
    ];

}
