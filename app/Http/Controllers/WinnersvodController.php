<?php

namespace App\Http\Controllers;

use App\Models\Winnersvod;
use App\Http\Requests\StoreWinnersvodRequest;
use App\Http\Requests\UpdateWinnersvodRequest;

class WinnersvodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreWinnersvodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWinnersvodRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Winnersvod  $winnersvod
     * @return \Illuminate\Http\Response
     */
    public function show(Winnersvod $winnersvod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Winnersvod  $winnersvod
     * @return \Illuminate\Http\Response
     */
    public function edit(Winnersvod $winnersvod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWinnersvodRequest  $request
     * @param  \App\Models\Winnersvod  $winnersvod
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWinnersvodRequest $request, Winnersvod $winnersvod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Winnersvod  $winnersvod
     * @return \Illuminate\Http\Response
     */
    public function destroy(Winnersvod $winnersvod)
    {
        //
    }
}
