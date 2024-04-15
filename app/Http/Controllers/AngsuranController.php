<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Angsuran;
use Illuminate\Http\Request;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Peminjaman::with('nasabah')->get();
        $angsuran = Angsuran::with('peminjaman')->get();
        return view('angsuran.index', compact('peminjaman', 'angsuran'));
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
        $peminjaman = Peminjaman::with('nasabah')->where('id', $id)->first();
        return view('angsuran.detail', ['peminjaman' => $peminjaman]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
