<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Angsuran;
use Illuminate\Http\Request;
use Carbon\Carbon;


class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::leftJoin('angsuran', 'peminjaman.id', '=', 'angsuran.peminjaman_id')
                        ->with('nasabah')
                        ->get();
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

        }
        return view('angsuran.index', compact('peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peminjaman = Peminjaman::leftJoin('angsuran', 'peminjaman.id', '=', 'angsuran.peminjaman_id')->with('nasabah')->where('peminjaman_id', $id)->first();
        return view('angsuran.detail', ['peminjaman' => $peminjaman]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cicilanTerbayar = $request->cicilan_terbayar + $request->angsuranTerbayar;

        $peminjaman = Angsuran::updateOrCreate(
            ['id' => $id],
            ['cicilan_terbayar' => $cicilanTerbayar]);

        return redirect(route('angsuran.index'))->with('success', 'Angsuran Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
