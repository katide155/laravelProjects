<?php

namespace App\Http\Controllers;

use App\Models\CompanyType;
use App\Http\Requests\StoreCompanyTypeRequest;
use App\Http\Requests\UpdateCompanyTypeRequest;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$companiesTypes = CompanyType::all();
		return view('companies-types.index', ['companiesTypes'=>$companiesTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $companyType = new CompanyType;
		$companyType->company_type_name = $request->company_type_name;
		$companyType->company_type_short_name = $request->company_type_short_name;
		$companyType->company_type_description = $request->company_type_description;
		
		$companyType->save();
		return redirect()->route('companytype.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyType  $companyType
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyType $companyType)
    {
        return view('companies-types.show', ['companyType'=>$companyType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyType  $companyType
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyType $companyType)
    {
        return view('companies-types.edit', ['companyType'=>$companyType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyTypeRequest  $request
     * @param  \App\Models\CompanyType  $companyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyType $companyType)
    {
		$companyType->company_type_name = $request->company_type_name;
		$companyType->company_type_short_name = $request->company_type_short_name;
		$companyType->company_type_description = $request->company_type_description;
		
		$companyType->save();
		return redirect()->route('companytype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyType  $companyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyType $companyType)
    {
       	$companies = $companyType->companyTypeCompanies;
		if(count($companies) != 0){
			return redirect()->route('companytype.index')->with('error_message', 'Trinti negalima, kompanijos tipas turi kompanijų');
		}
        $companyType->delete();
		return redirect()->route('companytype.index')->with('success_message', 'Sėkmingai ištrinta');
    }
}
