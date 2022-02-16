<?php

namespace App\Http\Controllers;

use App\Models\PaginationSettings;
use App\Http\Requests\StorePaginationSettingsRequest;
use App\Http\Requests\UpdatePaginationSettingsRequest;

class PaginationSettingsController extends Controller
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
     * @param  \App\Http\Requests\StorePaginationSettingsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaginationSettingsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaginationSettings  $paginationSettings
     * @return \Illuminate\Http\Response
     */
    public function show(PaginationSettings $paginationSettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaginationSettings  $paginationSettings
     * @return \Illuminate\Http\Response
     */
    public function edit(PaginationSettings $paginationSettings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaginationSettingsRequest  $request
     * @param  \App\Models\PaginationSettings  $paginationSettings
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaginationSettingsRequest $request, PaginationSettings $paginationSettings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaginationSettings  $paginationSettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaginationSettings $paginationSettings)
    {
        //
    }
}
