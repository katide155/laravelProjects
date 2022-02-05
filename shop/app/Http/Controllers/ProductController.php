<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$sortCol = $request->sortCol;
		$sortOrd = $request->sortOrd;


		$temp_cat = Product::all();
		//$prod_columns = array_keys($temp_cat->first()->getAttributes());

		if(empty($sortCol) || empty($sortOrd)){
			$products = Product::paginate(15);
		}
		else{	
			//
			
			//if($sortCol == 'category_id'){
				$sortBool = true;
				
				if($sortOrd == 'asc'){
					$sortBool = false;
				}
			
			$products = Product::get()->sortBy(function($query){
					return $query->productCategory->title;
			}, SORT_REGULAR, $sortBool)->paginate(15);
			//}else{
				//$products = Product::orderBy($sortCol, $sortOrd)->get();
			//}
		}
		
	
		$selectArray = array('category_id');// $prod_columns;
		
		$categories = ProductCategory::orderBy('title','asc')->get();
	

        return view('products.index', ['products'=>$products,'sortOrd'=>$sortOrd, 'sortCol'=>$sortCol, 'selectArray'=>$selectArray, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories = ProductCategory::orderBy('title','asc')->get();
        return view('products.create', ['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
		$product->title = $request->title;
		$product->price = $request->price;
		$product->description = $request->description;
		$product->category_id = $request->category_id;
		$productImage_id = (new ProductImageController)->store($request, 2); 
		$product->image_id = $productImage_id; 
		$product->image_url = 'pav.png';
		$product->save();
		return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
		$categories = ProductCategory::orderBy('title','asc')->get();
        return view('products.edit', ['product'=>$product, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
		$product->title = $request->title;
		$product->price = $request->price;
		$product->description = $request->description;
		$product->category_id = $request->category_id;
		$productImage = $product->productImage;
		$productImageUpdate = (new ProductImageController)->update($request, $productImage); 
		$product->image_id = $productImage->id;
		$product->image_url = 'pav.png';
		$product->save();
		return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
	
	public function filter(Request $request){
		
		$category_id = $request->category_id;
		
		$products = Product::where('category_id', '=', $category_id)->get();
		
		return view('products.filter', ['products'=>$products]);
		
	}
}
