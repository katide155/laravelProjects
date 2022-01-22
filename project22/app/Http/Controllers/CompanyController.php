<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyType;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$companies = Company::all();
		$companiesTypes = CompanyType::all();
		return view('companies.index', ['companies'=>$companies],['companiesTypes' => $companiesTypes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$select_values = [];
		
		for($i=1; $i<=250;$i++){
			$select_values[] = $i;
		}
		$companiesTypes = CompanyType::all();
        return view('companies.create', ['select_values' => $select_values],['companiesTypes' => $companiesTypes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompanyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;
		$company->company_name = $request->company_name;
		$company->company_type_id = $request->company_type_id;
		$company->company_description = $request->company_description;
		
		$company->save();
		return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
		$companiesTypes = CompanyType::all();
        return view('companies.show', ['company'=>$company],['companiesTypes' => $companiesTypes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
		$companiesTypes = CompanyType::all();
       return view('companies.edit', ['company'=>$company],['companiesTypes' => $companiesTypes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompanyRequest  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->company_name = $request->company_name;
		$company->company_type_id = $request->company_type_id;
		$company->company_description = $request->company_description;
		
		$company->save();
		return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
		$clients = $company->companyClients;
		if(count($clients) != 0){
			return redirect()->route('company.index')->with('error_message', 'Trinti negalima, kompanija turi klientų');
		}
        $company->delete();
		return redirect()->route('company.index')->with('success_message', 'Sėkmingai ištrinta');
    }
}
