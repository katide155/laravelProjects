<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreProductImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $fromProductController = 1)
    {
        $productImage = new ProductImage;
		$productImage->alt = $request->image_alt;
		
		$imageName = 'image'.time().'.'.$request->image_src->extension();
		
		$request->image_src->move(public_path('images/product-images'),$imageName);
		
		$productImage->src = $imageName;
		$productImage->width = $request->image_width;
		$productImage->height = $request->image_height;
		$productImage->class = $request->image_class;
	
		$productImage->save();
		
		if($fromProductController != 1) {
			return $productImage->id;
		}
		return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductImage $productImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductImageRequest  $request
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductImage $productImage)
    {
		if($request->has('image_src')){ 
			if (File::exists(public_path('images/product-images/'.$productImage->src))) {
				File::delete(public_path('images/product-images/'.$productImage->src));
			}
			
			$imageName = 'image'.time().'.'.$request->image_src->extension();
			$request->image_src->move(public_path('images/product-images'),$imageName);
			$productImage->src = $imageName;

		}

		$productImage->alt = $request->image_alt;
		$productImage->width = $request->image_width;
		$productImage->height = $request->image_height;
		$productImage->class = $request->image_class;
	
		$productImage->save();
		return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductImage $productImage)
    {
        //
    }
}
