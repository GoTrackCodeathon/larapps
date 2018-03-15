<?php

namespace App\Http\Controllers;

use App\FiuReport;
use Illuminate\Http\Request;

class FiuReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FiuReport::all();
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
     * @param  \App\FiuReport  $fiuReport
     * @return \Illuminate\Http\Response
     */
    public function show(FiuReport $fiuReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FiuReport  $fiuReport
     * @return \Illuminate\Http\Response
     */
    public function edit(FiuReport $fiuReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FiuReport  $fiuReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FiuReport $fiuReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FiuReport  $fiuReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(FiuReport $fiuReport)
    {
        //
    }
}
