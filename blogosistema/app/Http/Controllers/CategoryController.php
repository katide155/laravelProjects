<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
        $pages_in_sheet = $request->pages_in_sheet ?? 5;
		
        
        $sort  = $request->sort;
        $direction  = $request->direction;


        $paginationSettings = ['5'=>5, '10'=>10, 'all'=>1];

 
            if($pages_in_sheet == 1) {
				$categories = Category:: withCount('categoryPosts')->sortable()->get();
            } else {
				$categories = Category:: withCount('categoryPosts')->sortable()->paginate($pages_in_sheet);
            }

      
        return view('categories.index', [
            'categories'=> $categories,
            'paginationSettings' => $paginationSettings,
            'pages_in_sheet' => $pages_in_sheet,
            'sort' => $sort,
            'direction' => $direction,
        ]);
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		 $validated = $request->validate([
			'category_title' => 'required|max:16',
			'category_description' => 'required|max:255',
		]);
		
        $category = new Category;
		
		$category->title = $request->category_title;
		$category->description = $request->category_description;
		$category->visibility = $request->category_visibility; 
		
		$category->save();
		
		if($request->category_newpost){
			$post_title = $request->post_title; 
			$total = count($post_title); 
		  
			for($i=0; $i<$total; $i++) {
			
				   $post = new Post;
				   $post->title = $request->post_title[$i];
				   $post->description = $request->post_description[$i];
				   $post->visibility = $request->post_visibility[$i];
					$post->category_id = $category->id;
					
				   $post->save();
			}
		}
		return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
			return view('categories.show', ['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
		$posts = Post::all()->sortBy('title');
		$categoryPosts = $category->categoryPosts; 
		return view('categories.edit', ['category'=>$category, 'posts'=>$posts, 'categoryPosts'=>$categoryPosts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
		$category->title = $request->category_title;
		$category->description = $request->category_description;
		$category->visibility = $request->category_visibility; 
		
		$category->save();
		
		if($request->category_newpost){
			$post_title = $request->post_title; 
			$total = count($post_title); 
		  
			for($i=0; $i<$total; $i++) {
			
				   $post = new Post;
				   $post->title = $request->post_title[$i];
				   $post->description = $request->post_description[$i];
				   $post->visibility = $request->post_visibility[$i];
					$post->category_id = $category->id;
					
				   $post->save();
			}
		}
		return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       	$categoryPosts = $category->categoryPosts;
		if(count($categoryPosts) != 0){
			return redirect()->route('category.index')->with('error_message', 'Trinti negalima, kategorija turi postų');
		}
        $category->delete();
		return redirect()->route('category.index')->with('success_message', 'Sėkmingai ištrinta');
    }
}
