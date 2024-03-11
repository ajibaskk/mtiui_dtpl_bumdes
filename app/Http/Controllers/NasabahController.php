<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNasabahRequest;
use App\Http\Requests\UpdateNasabahRequest;
use App\Models\Nasabah;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nasabah = Nasabah::all();
        return view('nasabah.index', ['nasabah' => $nasabah]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nasabah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNasabahRequest $request)
    {
        $data = $request->validate([
            "nik" => 'required',
            'nama_lengkap' => 'required',
            "alamat_lengkap" => 'required',
            "tempat_lahir" => 'required',
            "tanggal_lahir" => 'required',
            "jenis_kelamin" => 'required',
            "jenis_pekerjaan" => 'required',
            "rentang_penghasilan" => 'required',
            "pendidikan_terakhir" => 'required',
            "file_ktp_location" => 'required',
        ]);

        $newNasabah = Nasabah::create($data);

        return redirect(route('nasabah.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Nasabah $nasabah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nasabah $nasabah)
    {
        return view('nasabah.edit', ['nasabah' => $nasabah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNasabahRequest $request, Nasabah $nasabah)
    {
        $data = $request->validate([
            "nik" => 'required',
            'nama_lengkap' => 'required',
            "alamat_lengkap" => 'required',
            "tempat_lahir" => 'required',
            "tanggal_lahir" => 'required',
            "jenis_kelamin" => 'required',
            "jenis_pekerjaan" => 'required',
            "rentang_penghasilan" => 'required',
            "pendidikan_terakhir" => 'required',
        ]);

        $nasabah->update($data);

        return redirect(route('nasabah.index'))->with('success', 'Nasabah Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nasabah $nasabah)
    {
        $nasabah->delete();
        return redirect(route('nasabah.index'))->with('success', 'Nasabah Deleted Successfully');
    }
}
