<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNasabahRequest;
use App\Http\Requests\UpdateNasabahRequest;
use App\Models\Nasabah;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request('search')) {
            $nasabah = Nasabah::where('nama_lengkap', 'like', '%' . request('search') . '%')->paginate(10);
        } else {
            $nasabah = Nasabah::paginate(10);
        }
        return view('nasabah.index', compact('nasabah'));
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
            "file_ktp_location" => 'required|file',
        ]);

        $newNasabah = Nasabah::create($data);

        // get dropzone image
        if ($request->file('file_ktp_location')) {
            $file = $request->file('file_ktp_location');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = Storage::putFileAs('public', $file, $filename);
            $newNasabah->update([
                'file_ktp_location' => str_replace("public", "storage", $path)
            ]);
        }
        Log::info($newNasabah);


        return redirect(route('nasabah.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Nasabah $nasabah)
    {
        $peminjaman = Peminjaman::where('nasabah_id', $nasabah->nasabah_id)->get();
        return view('nasabah.detail', ['nasabah' => $nasabah, 'peminjaman' => $peminjaman]);
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