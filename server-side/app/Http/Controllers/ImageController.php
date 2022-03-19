<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Validator;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$csrf = $request->csrf;
		
		if( isset($csrf) && !empty($csrf) && $csrf == '123456789' ){
			$images = Image::paginate(15);
			
			return response()->json($images);
		
		}

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
			'image_title' => $request->image_title,
			'image_url' => $request->image_url,
			'image_alt' => $request->image_alt,
			'image_description' => $request->image_description,
		];
		
		$rules = [
			'image_title' => 'required',
			'image_url' => 'required',
			'image_alt' => 'required',
			'image_description' => 'required',
		];
		

		
		$validator = Validator::make($input, $rules);
		
		if($validator->fails()){
			
			$errors = $validator->messages()->get('*');
			return response()->json(array(
				'error_message' => 'Nepraejo',
				'errors' => $errors
			));			
			
			
		}else{
			$image = new Image;
			
			$image->title = $request->image_title;
			$image->url = $request->image_url;
			$image->alt = $request->image_alt;
			$image->description = $request->image_description;
			
			$image->save();
			
			return response()->json(array(
				'success' => 'image added',
				'title' => $image->title				
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
        $image = Image::find($id);
		
		return response()->json($image);
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
			'image_title' => $request->image_title,
			'image_url' => $request->image_url,
			'image_alt' => $request->image_alt,
			'image_description' => $request->image_description,
		];
		
		$rules = [
			'image_title' => 'required',
			'image_url' => 'required',
			'image_alt' => 'required',
			'image_description' => 'required',
		];
		

		
		$validator = Validator::make($input, $rules);
		
		if($validator->fails()){
			
			$errors = $validator->messages()->get('*');
			return response()->json(array(
				'error_message' => 'Nepraejo',
				'errors' => $errors
			));			
			
			
		}else{
			$image = Image::find($id);
			
			$image->title = $request->image_title;
			$image->url = $request->image_url;
			$image->alt = $request->image_alt;
			$image->description = $request->image_description;
			
			$image->save();
			
			return response()->json(array(
				'success' => 'image added',
				'title' => $image->title				
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
        $image = Image::find($id);
		$image->delete();
		
		return response()->json(array(
			'successMessage' => 'Image deleted'
		));
    }
}
