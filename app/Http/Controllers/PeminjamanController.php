<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Peminjaman;
use App\Models\Pinjaman;
use App\Models\MasterBunga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PDF;

class PeminjamanController extends Controller
{
    //
    public function index(Request $request)
    {
        $nasabah = Nasabah::all();

        $selectedUser = [
            "nama_lengkap"=> "Budi"
        ];
        if (request('id')) {
            Log::info("Here log");
            $selectedUser = Nasabah::where('id', request('id'))->first();
            Log::info($selectedUser);
        }

        return view('peminjaman.index', compact('nasabah', 'selectedUser'));
    }

    public function create(Nasabah $nasabah)
    {
        $pinjaman = Pinjaman::all()->sortBy("nominal");
        $waktuAngsuran = MasterBunga::all()->sortBy("waktu_angsuran");
        return view('peminjaman.create', ['nasabah' => $nasabah, 'pinjaman'=> $pinjaman, 'waktuAngsuran' => $waktuAngsuran]);
    }

    public function store(Request $request, Nasabah $nasabah)
    {
        $waktuAngsuran = MasterBunga::where("waktu_angsuran", $request->tenor)->first();
        $totalPinjaman = ($request->tenor + 100)/100 * $request->jumlah_pinjaman;
        $angsuran = $totalPinjaman / $request->tenor;
        $data = [
            'nasabah_id' => $nasabah->nasabah_id,
            'nama_usaha' => $request->nama_usaha,
            'jenis_usaha' => $request->jenis_usaha,
            'deskripsi_usaha' => $request->deskripsi_usaha,
            'jumlah_pinjaman' => $request->jumlah_pinjaman,
            'tenor' => $request->tenor,
            'bunga' => $waktuAngsuran->bunga,
            'total_pinjaman' => floor($totalPinjaman),
            'angsuran' => $angsuran,
            'status' => 'DIAJUKAN'
        ];

        $peminjaman = Peminjaman::create($data);
        Log::info($peminjaman);

        return redirect(route('nasabah.detail', ['nasabah' => $nasabah]));
    }

    public function detail(Nasabah $nasabah, Peminjaman $peminjaman)
    {
        return view('peminjaman.detail', ['nasabah' => $nasabah, 'peminjaman'=> $peminjaman]);
    }

    public function generatePDF(Nasabah $nasabah, Peminjaman $peminjaman) {
        $data = ['nasabah' => $nasabah, 'peminjaman'=> $peminjaman];

        $peminjaman->status = 'DIPROSES';
        $peminjaman->save();
        view()->share('peminjaman.pdf',$data);
        $pdf = PDF::loadView("peminjaman.pdf", $data);
        return $pdf->stream('form-pinjaman.pdf');
    }

    public function approve(Nasabah $nasabah, Peminjaman $peminjaman)
    {
        $peminjaman->status = 'DISETUJUI';
        $peminjaman->save();
        return redirect(route('nasabah.detail', ['nasabah' => $nasabah]));
    }
}

