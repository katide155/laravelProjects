<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use App\Models\Company;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$clients = Client::all();
		$companies = Company::all();
		return view('clients.index', ['clients'=>$clients],['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$companies = Company::all();
        return view('clients.create',['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = new Client;
		$client->client_name = $request->client_name;
		$client->client_surname = $request->client_surname;
		$client->client_username = $request->client_username;
		$client->client_company_id = $request->client_company_id;
		$client->client_image_url = $request->client_image_url;
		
		$client->save();
		return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
		$companies = Company::all();
         return view('clients.show', ['client'=>$client],['companies'=>$companies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
		
        $companies = Company::all();
        return view('clients.edit', ['client'=>$client, 'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->client_name = $request->client_name;
		$client->client_surname = $request->client_surname;
		$client->client_username = $request->client_username;
		$client->client_company_id = $request->client_company_id;
		$client->client_image_url = $request->client_image_url;
		
		$client->save();
		return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
		return redirect()->route('client.index');
    }
}
