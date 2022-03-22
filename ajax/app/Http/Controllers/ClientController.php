<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$csrf = $request->csrf;
		$clientsAll = $request->clientsAll;
		
		if( isset($csrf) && !empty($csrf) && $csrf == '123456789' ){
			
			if( isset($clientsAll) && !empty($clientsAll) &&  $clientsAll == 'all'){
				$clients = Client::all();
				return response()->json($clients);
			}else{
				$clients = Client::paginate(15);
				return response()->json($clients);
			}
		}
       
		  //$clients = Client::all();

        return response()->json(array(
				'error' => 'error message'
		));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

			$input = [
			'client_name' => $request->client_name,
			'client_surname' => $request->client_surname,
			'client_description' => $request->client_description,
		];
		
		$rules = [
			'client_name' => 'required',
			'client_surname' => 'required',
			'client_description' => 'required',
		];
		

		
		$validator = Validator::make($input, $rules);
		
		if($validator->fails()){
			
			$errors = $validator->messages()->get('*');
			return response()->json(array(
				'error_message' => 'Nepraejo',
				'errors' => $errors
			));			
			
			
		}else{
			$client = new Client;
			
			$client->name = $request->client_name;
			$client->surname = $request->client_surname;
			$client->description = $request->client_description;
			
			$client->save();
			
			return response()->json(array(
				'success' => 'Client added',
				'name' => $client->name,
				'surname' => $client->surname,
				
			));
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
		
		return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		
		$input = [
			'client_name' => $request->client_name,
			'client_surname' => $request->client_surname,
			'client_description' => $request->client_description,
		];
		
		$rules = [
			'client_name' => 'required',
			'client_surname' => 'required',
			'client_description' => 'required',
		];
		

		
		$validator = Validator::make($input, $rules);
		
		if($validator->fails()){
			
			$errors = $validator->messages()->get('*');
			return response()->json(array(
				'error_message' => 'Nepraejo',
				'errors' => $errors
			));			
			
			
		}else{
			
			$client = Client::find($id);
			$client->name = $request->client_name;
			$client->surname = $request->client_surname;
			$client->description = $request->client_description;
			
			$client->save();
			
			return response()->json(array(
				'success' => 'Client edited',
				'name' => $client->name,
				'surname' => $client->surname,
				
			));
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
		$client->delete();
		
		return response()->json(array(
			'successMessage' => 'Client deleted'
		));
    }
}
