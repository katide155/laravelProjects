<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$types = Type::all();
		return view('types.index', ['types'=>$types]);
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
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function showAjax(Type $type)
    {
        $type_info = array(
			'success_message' => 'Type retrived successfuly',
			'type_title' => $type->title,
			'type_description' => $type->description,
			'type_id' => $type->id,
		);
		
		$jason_response = response()->json($type_info);
		
		return $jason_response;	
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function updateAjax(Request $request, Type $type)
    {
        $type->title = $request->article_title;
		$type->description = $request->article_description;
		
		$type->save();
		
		$type_info = array(
			'success_message' => 'type updated successfuly',
			'type_title' => $type->title,
			'type_description' => $type->description,
			'type_id' => $type->id,
		);
		
		$jason_response = response()->json($type_info);
		
		return $jason_response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
	
	public function destroyAjax(Type $type)
    {
       
		
		$articleCount = count($type->typeArticles);
		
		if($articleCount > 0)	{
			$type_info = array(
				'error_message' => 'Type '.$type->title." can't be deleted, because it hal articles",
			);		
		}	
		else{
			$type->delete();
			$type_info = array(
				'success_message' => 'Type '.$type->title.' deleted successfuly',
			);
		};
		
		$jason_response = response()->json($type_info);
		
		return $jason_response;
    }
}
