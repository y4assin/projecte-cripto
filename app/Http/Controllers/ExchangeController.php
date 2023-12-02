<?php

namespace App\Http\Controllers;

use App\Models\Exchange;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExchangeRequest;
use App\Http\Requests\UpdateExchangeRequest;

class ExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Desem a un vector totes les dades la taula "exchanges".
        $exchanges = Exchange::all();
        // Retornem les dades generades cap a la vista "exchanges.index".
        return view('exchanges.index', compact('exchanges'));

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
    public function store(StoreExchangeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Exchange $exchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exchange $exchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExchangeRequest $request, Exchange $exchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exchange $exchange)
    {
        //
    }
}
