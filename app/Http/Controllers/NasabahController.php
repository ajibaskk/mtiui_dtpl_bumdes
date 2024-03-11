<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNasabahRequest;
use App\Http\Requests\UpdateNasabahRequest;
use App\Models\Nasabah;
use Illuminate\View\View;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNasabahRequest $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNasabahRequest $request, Nasabah $nasabah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nasabah $nasabah)
    {
        //
    }
}
