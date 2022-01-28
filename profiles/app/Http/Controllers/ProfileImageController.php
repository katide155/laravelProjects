<?php

namespace App\Http\Controllers;

use App\Models\ProfileImage;
use App\Http\Requests\StoreProfileImageRequest;
use App\Http\Requests\UpdateProfileImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProfileImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$profileImages = ProfileImage::all();
        return view('profileimages.index', ['profilemages'=>$profileImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profileimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfileImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $profileImage = new ProfileImage;
		$profileImage->alt = $request->image_alt;
		
		//paveiksliuko pavadinimo sudarymas turi būti unikalus time();
		
		$imageName = 'image'.time().'.'.$request->image_src->extension();
		
		//talpinimas į serverį
		$request->image_src->move(public_path('images/profile-images'),$imageName);
		
		
		
		$profileImage->src = $imageName;
		$profileImage->width = $request->image_width;
		$profileImage->height = $request->image_height;
		$profileImage->class = $request->image_class;
	
		$profileImage->save();
		return redirect()->route('profileimage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileImage $profileImage)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileImage $profileImage)
    {
         return view('profileimages.edit', ['profileImage'=>$profileImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfileImageRequest  $request
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileImage $profileImage)
    {
		if($request->has('image_src')){ //if isset(post[image_src] && ar netuscia)
			if (File::exists(public_path('images/profile-images/'.$profileImage->src))) {
				File::delete(public_path('images/profile-images/'.$profileImage->src));
			}
			
			$imageName = 'image'.time().'.'.$request->image_src->extension();
			$request->image_src->move(public_path('images/profile-images'),$imageName);
			$profileImage->src = $imageName;

		}

		$profileImage->alt = $request->image_alt;
		$profileImage->width = $request->image_width;
		$profileImage->height = $request->image_height;
		$profileImage->class = $request->image_class;
	
		$profileImage->save();
		return redirect()->route('profileimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfileImage  $profileImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileImage $profileImage)
    {
        //
    }
}
