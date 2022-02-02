<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorImage;
use App\Http\Controllers\AuthorImageController;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$authors = Author::all();
		
        return view('authors.index', ['authors'=>$authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $author = new Author;
		$author->name = $request->name;
		$author->surname = $request->surname;
	
		
		//$authorImage = new AuthorImage;
		$authorImage_id = (new AuthorImageController)->store($request, 2); //sita vieta, ji viska ok padaro, bet ko ji nesugeba sugrazinti id
		
		//SItoje vietoje kreipiesi i kito controllerio funkcija kuri gali patalpinti tau paveiksliu
		//taciau sita funkcija tau grazina redirect
		//vadinasi reikia kazkokio papildomo parametro pagal kuri butu galima atskirti, ar store funkcija vyksta is kito controllerio
		//tas parametras $fromAuthorController = 1, jo numatytoji reiksme 1
		//jei numatytoji reiksme 1 store funkcija elgiasi galima sakyti standartiskai
		//(new AuthorImageController)->store($request, 2); dabar sitoje vietoje perduodu skaiciu 2
		//jei skaicius = 2, suveikia return kuris grazina paveiksliuko id
	
		//$authorImage->alt = $request->image_alt; 
		
		//palik uzkomentuota koda
		
		//$imageName = 'image'.time().'.'.$request->image_src->extension();
		
		//$request->image_src->move(public_path('images/author-images'),$imageName);
		
		//$authorImage->src = $imageName;
		//$authorImage->width = $request->image_width;
		//$authorImage->height = $request->image_height;
		//$authorImage->class = $request->image_class;
		//$authorImage->save();
		//$author->author_image_id = $authorImage->id; 
		
		$author->author_image_id = $authorImage_id; 
		$author->save();
		return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', ['author'=>$author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
		$author->name = $request->name;
		$author->surname = $request->surname;
		$authorImage = $author->authorImage;
		
		// if($request->has('image_src')){ 
			// if (File::exists(public_path('images/author-images/'.$authorImage->src))) {
				// File::delete(public_path('images/author-images/'.$authorImage->src));
			// }
			
			// $imageName = 'image'.time().'.'.$request->image_src->extension();
			// $request->image_src->move(public_path('images/author-images'),$imageName);
			// $authorImage->src = $imageName;

		// }

		// $authorImage->alt = $request->image_alt;
		// $authorImage->width = $request->image_width;
		// $authorImage->height = $request->image_height;
		// $authorImage->class = $request->image_class;
		// $authorImage->save();
		
		$authorImageUpdate = (new AuthorImageController)->update($request, $authorImage);
		
		$author->author_image_id = $authorImage->id;
		
		$author->save();
		return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
