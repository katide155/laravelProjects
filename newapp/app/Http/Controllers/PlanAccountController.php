<?php

namespace App\Http\Controllers;

use App\Models\PlanAccount;
use App\Http\Requests\StorePlanAccountRequest;
use App\Http\Requests\UpdatePlanAccountRequest;

class PlanAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$articles = Article::sortable()->get();
		return view('accounts-plan.index'/*, ['articles'=>$articles, 'articleTypes'=>$articleTypes]*/);
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
     * @param  \App\Http\Requests\StorePlanAccountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function show(PlanAccount $planAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanAccount $planAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanAccountRequest  $request
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanAccountRequest $request, PlanAccount $planAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanAccount  $planAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanAccount $planAccount)
    {
        //
    }
}
