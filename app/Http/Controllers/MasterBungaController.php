<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMasterBungaRequest;
use App\Http\Requests\UpdateMasterBungaRequest;
use App\Models\MasterBunga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MasterBungaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bungas = MasterBunga::all()->sortBy("bunga");
        return view('master.bunga', compact('bungas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'bunga' => $request->bunga,
            'waktu_angsuran' => $request->waktu_angsuran
        ];

        $bunga = MasterBunga::create($data);
        Log::info($bunga);
        return redirect(route('master.bunga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $bunga = MasterBunga::find($request->bungaId);

        $data = [
            'bunga' => $request->bunga,
            'waktu_angsuran' => $request->waktu_angsuran
        ];

        $bunga->update($data);
        Log::info($bunga);

        return redirect(route('master.bunga'))->with('success', 'Bunga Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MasterBunga $masterBunga)
    {
        $masterBunga->delete();
        return redirect(route('master.bunga'))->with('success', 'Bunga Deleted Successfully');
    }
}
