<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		
		$category_id = $request->category_id;
        $pages_in_sheet = $request->pages_in_sheet;
        
        $sort  = $request->sort;
        $direction  = $request->direction;

        $categories = Category::all()->sortBy('title');
        $paginationSettings = ['15'=>15, '30'=>30, 'all'=>1];

        if(empty($category_id) || $category_id == 'all') {
            if($pages_in_sheet == 1) {
                $posts = Post::sortable()->get();
            } else {
                $posts = Post::sortable()->paginate($pages_in_sheet);
            }
        } else {
            if($pages_in_sheet == 1) {
                $posts = Post::where('category_id', '=', $category_id)->sortable()->get();
            } else {
                $posts = Post::where('category_id', '=', $category_id)->sortable()->paginate($pages_in_sheet);
            }
        }   
        return view('posts.index', [
            'posts'=> $posts,
            'categories' => $categories,
            'paginationSettings' => $paginationSettings,
            'category_id'=> $category_id,
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
        $categories = Category::all()->sortBy('title');
		return view('posts.create', ['categories'=>$categories] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$validated = $request->validate([
			'post_title' => 'string|required|max:25',
			'post_description' => 'required|max:255',
			'post_visibility' => 'integer|required',
		]);
		
        $post = new Post;
		$post->title = $request->post_title;
		$post->description = $request->post_description;
		$post->visibility = $request->post_visibility;
		if($request->post_newcategory){
			$category = new Category;
			
			$category->title = $request->category_title;
			$category->description = $request->category_description;
			$category->visibility = $request->category_visibility;
			$category->save();
			$post->category_id = $category->id;
		}else{
			$post->category_id = $request->post_category_id;
		}
		
		$post->save();
		
		return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
     	$postCategory = $post->postCategory->title;
        return view('posts.show', ['post'=>$post],['postCategory'=>$postCategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
		$categories = Category::all()->sortBy('title');
		return view('posts.edit', ['post'=>$post, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
		$post->title = $request->post_title;
		$post->description = $request->post_description;
		$post->visibility = $request->post_visibility;
		if($request->post_newcategory){
			$category = new Category;
			
			$category->title = $request->category_title;
			$category->description = $request->category_description;
			$category->visibility = $request->category_visibility;
			$category->save();
			$post->category_id = $category->id;
		}else{
			$post->category_id = $request->post_category_id;
		}
		
		$post->save();
		
		return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
		return redirect()->route('post.index')->with('success_message', 'S??kmingai i??trinta');
    }
	

}
