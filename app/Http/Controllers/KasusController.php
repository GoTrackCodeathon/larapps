<?php

namespace App\Http\Controllers;

use App\Kasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kasus::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show(Kasus $kasus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit(Kasus $kasus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kasus $kasus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kasus $kasus)
    {
        //
    }
}
