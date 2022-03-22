<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//$this->loadDataFromApi();
       // return view('test', ['clients'=> json_decode($response)]);
	  // $clients = Client::all();
	   
	   // $companies = Company::all();
	   // $clients = $clients->toArray();
	   // $companies = $companies->toArray();

	    // $i = 0;
	   // foreach($clients as $client){
		    // foreach( $companies as $company){
				// if($company['title'] == $client['company_title']){
					
					// $clients[$i]['contact'] = $company['contact'];
				// }
			// }
			// $i++;
	   // };
	   
	   $clients = Client::select("clients.*","clients.id as clientId","companies.id as companyId")
			->leftJoin('companies', function($join){
		   $join->on('companies.title', '=', 'clients.company_title');
	   })->orderBy('clients.id', 'asc')->get();
	   
	   
	  //dd($clients->toArray());
	   return view('client.test',['clients'=> $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('clientscurl.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = [
			'client_name' => $request->client_name,
			'client_surname' => $request->client_surname,
			'client_description' => $request->client_description,
			'client_company_title' => $request->client_company_title,
		];
		
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://127.0.0.1:8000/api/clients",
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
			),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		$this->loadDataFromApi();
		
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$client = Client::where('api_client_id', '=', $id)->first();
        return view('clientscurl.edit', ['id'=> $id, 'client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       		$data = [
			'client_name' => $request->client_name,
			'client_surname' => $request->client_surname,
			'client_description' => $request->client_description,
			'client_company_title' => $request->client_company_title,
		];
		
        $curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://127.0.0.1:8000/api/clients/".$id,
			CURLOPT_CUSTOMREQUEST => "PUT",
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POSTFIELDS => json_encode($data),
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
			),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		$this->loadDataFromApi();
		
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
        //
    }
	
	public function loadDataFromApi(){
		
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://127.0.0.1:8000/api/clients?csrf=123456789&clientsAll=all",
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_ENCODING => "",
			CURLOPT_TIMEOUT => 30000,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json',
			),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		curl_close($curl);
		
		$deleteClient = Client::all();
		if(count($deleteClient)>0){
			foreach($deleteClient as $row){
				$row->delete();
			}
		}
		
		$clients = json_decode($response);
		
		foreach($clients as $client){
			$newClient = new Client;
			$newClient->name = $client->name;
			$newClient->surname = $client->surname;
			$newClient->description = $client->description;
			$newClient->company_title = $client->company_title;
			$newClient->api_client_id = $client->id;
			$newClient->save();
		};
	}
}
