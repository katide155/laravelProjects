<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
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

		if(empty($sortCol) || empty($sortOrd)){
			$categories = ProductCategory::all();
		}
		else{	
			$categories = ProductCategory::orderBy($sortCol, $sortOrd)->get();
		}
		

	
		$selectArray = array_keys($categories->first()->getAttributes());


        return view('categories.index', ['categories'=>$categories,'sortOrd'=>$sortOrd, 'sortCol'=>$sortCol, 'selectArray'=>$selectArray]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategory = new ProductCategory;
		$productCategory->title = $request->title;
		$productCategory->description = $request->description;
		$productCategory->save();
		return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
         return view('categories.edit', ['productCategory'=>$productCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductCategoryRequest  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
		$productCategory->title = $request->title;
		$productCategory->description = $request->description;
		$productCategory->save();
		return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
        //
    }
	
	public function search(Request $request){
		
		$search_key = $request->search_key;
		
		$categories = ProductCategory::where('title', 'LIKE', '%'.$search_key.'%')
		->orWhere('id', 'LIKE', '%'.$search_key.'%')
		->orWhere('description', 'LIKE', '%'.$search_key.'%')->get();  
		
		return view('categories.search', ['categories'=>$categories]);
		
	}
}
