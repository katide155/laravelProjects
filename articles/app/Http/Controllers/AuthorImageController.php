<?php

namespace App\Http\Controllers;

use App\Models\AuthorImage;
use App\Http\Requests\StoreAuthorImageRequest;
use App\Http\Requests\UpdateAuthorImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$authorImages = AuthorImage::all();
        return view('authorimages.index', ['authorimages'=>$authorImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authorimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $fromAuthorController = 1)
    {
        $authorImage = new AuthorImage;
		$authorImage->alt = $request->image_alt;
		
		$imageName = 'image'.time().'.'.$request->image_src->extension();
		
		$request->image_src->move(public_path('images/author-images'),$imageName);
		
		$authorImage->src = $imageName;
		$authorImage->width = $request->image_width;
		$authorImage->height = $request->image_height;
		$authorImage->class = $request->image_class;
	
		$authorImage->save();
		
		if($fromAuthorController != 1) {
			return $authorImage->id;
		}
		return redirect()->route('authorimage.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorImage $authorImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorImage $authorImage)
    {
        return view('authorimages.edit', ['authorImage'=>$authorImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorImageRequest  $request
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthorImage $authorImage)
    {
		if($request->has('image_src')){ 
			if (File::exists(public_path('images/author-images/'.$authorImage->src))) {
				File::delete(public_path('images/author-images/'.$authorImage->src));
			}
			
			$imageName = 'image'.time().'.'.$request->image_src->extension();
			$request->image_src->move(public_path('images/author-images'),$imageName);
			$authorImage->src = $imageName;

		}

		$authorImage->alt = $request->image_alt;
		$authorImage->width = $request->image_width;
		$authorImage->height = $request->image_height;
		$authorImage->class = $request->image_class;
	
		$authorImage->save();
		return redirect()->route('authorimage.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorImage $authorImage)
    {
        //
    }
}
