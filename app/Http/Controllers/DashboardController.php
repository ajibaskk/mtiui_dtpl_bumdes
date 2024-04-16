<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Angsuran;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index(): View
    {
        $peminjaman = Peminjaman::leftJoin('angsuran', 'peminjaman.id', '=', 'angsuran.peminjaman_id')
                        ->with('nasabah')
                        ->get();

        $lancarCount = 0;
        $tidakLancarCount = 0;
        $lunasCount = 0;
        $totalPinjamanSemuanya = 0;

        foreach ($peminjaman as $p) {
            $cicilanTerbayar = $p->cicilan_terbayar;
            $angsuran = $p->angsuran;
            $totalPinjaman = $p->total_pinjaman;

            $createdDate = Carbon::parse($p->created_at);
            $currentDate = Carbon::now();
            $diffInMonths = $currentDate->diffInMonths($createdDate);

            $cicilanSeharusnyaSekarang = $angsuran * $diffInMonths;

            $kategoriCicilan = $cicilanSeharusnyaSekarang >= $cicilanTerbayar ? 'Terlambat' : 'Lancar';

            $kategori = $totalPinjaman == $cicilanTerbayar ? 'Lunas' : $kategoriCicilan;

            $p->kategori = $kategori;

            if ($kategori === 'Lancar') {
                $lancarCount++;
            } else if ($kategori === 'Terlambat') {
                $tidakLancarCount++;
            } else {
                $lunasCount++;
            }

            $totalPinjamanSemuanya += $p->total_pinjaman;
        }
        return view('dashboard.home', compact('totalPinjamanSemuanya', 'lancarCount', 'tidakLancarCount', 'lunasCount'));
    }
}
