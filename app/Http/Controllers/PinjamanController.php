<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use Illuminate\Support\Facades\Log;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjaman = Pinjaman::all()->sortBy("nominal");
        return view('pinjaman.index', compact('pinjaman'));
    }
    
    public function store(Request $request) {
        $data = [
            'nominal' => $request->nominal
        ];
        
        $pinjaman = Pinjaman::create($data);
        Log::info($pinjaman);
        
        return redirect(route('pinjaman.index'));
    }
    
    public function update(Request $request) {
        $pinjaman = Pinjaman::find($request->pinjamanID);
        
        $data = [
            'nominal' => $request->nominal
        ];
        
        $pinjaman->update($data);
        Log::info($pinjaman);
        
        return redirect(route('pinjaman.index'))->with('success', 'Pinjaman Updated Successfully');;
    }
    
    public function destroy(Pinjaman $pinjaman)
    {
        $pinjaman->delete();
        return redirect(route('pinjaman.index'))->with('success', 'Pinjaman Deleted Successfully');
    }
}
