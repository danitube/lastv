<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;

class PageController extends Controller
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
     * @param  \App\Http\Requests\StorePageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePageRequest  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        //
    }


    public function qanda()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.qanda',compact('allsettings'));
        
    }

    public function donation()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.donation',compact('allsettings'));
        
    }

    public function privacy()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.privacy',compact('allsettings'));
        
    }
    
    public function about()
    {
        $allsettings = DB::table('settings')->first();
        return view('layouts.style.about',compact('allsettings'));
        
    }


}
