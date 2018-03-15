<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\UnscrIndividual;
use Illuminate\Http\Request;

class UnscrIndividualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UnscrIndividual::all();
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
     * @param  \App\UnscrIndividual  $unscrIndividual
     * @return \Illuminate\Http\Response
     */
    public function show(UnscrIndividual $individu)
    {
        dd($individu->name_alias);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnscrIndividual  $unscrIndividual
     * @return \Illuminate\Http\Response
     */
    public function edit(UnscrIndividual $unscrIndividual)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnscrIndividual  $unscrIndividual
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnscrIndividual $unscrIndividual)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnscrIndividual  $unscrIndividual
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnscrIndividual $unscrIndividual)
    {
        //
    }

    public function refresh()
    {
        try {
            $client = new Client();
            $res    = $client->get('https://scsanctions.un.org/al-qaida/');
            $xml    = simplexml_load_string((string) $res->getBody());

            UnscrIndividual::createFromXML($xml->INDIVIDUALS[0]);

            return response()->json(['error' => false]);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
