<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorImage;
use App\Models\Book;
use App\Http\Controllers\AuthorImageController;
use App\Http\Controllers\BookController;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		//$authors = Author::all();
		
		//$authors = Author::all()->sortBy('surname', SORT_REGULAR, false);
		
		$sortCol = $request->sortCol;
		$sortOrd = $request->sortOrd;

		if(empty($sortCol) || empty($sortOrd)){
			$authors = Author::all();
		}
		else{	
			$authors = Author::orderBy($sortCol, $sortOrd)->get();
		}
		
		$authorius = $authors->first();
	
		$selectArray = DB::getSchemaBuilder()->getColumnListing('authors');
		//$selectArray = array_keys($authors->first()->getAttributes()); arba šis
		
		//paieška, filter


        return view('authors.index', ['authors'=>$authors,'sortOrd'=>$sortOrd, 'sortCol'=>$sortCol, 'authorius'=>$authorius, 'selectArray'=>$selectArray]);
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
    public function createval(Request $request)
    {
		$request->validate([
			"input_count" => "integer",
		]);
        return view('authors.createval');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
        //min galime ivesti minimaliai simboliu
        //max kiek mes galime ivesti maksimaliai simboliu
        //alpha tikrina ar ivestos tik raides
        //alpha_num tikrina ar ivestos tik raides arba skaiciai
        //alpha_dash tikrina ar ivestos tik raides arba skaiciai, bet papildomai priima 2 simbolius: _, -
        //numeric - tikrina ar skaicius, integer(3.14, -5, 15, 0)
        //integer - tikrina ar sveikasis skaicius(-, 0, +)
        
        //naturalusis skaicius yra nuo 1 - +inf
        //gt(greater than)  gt:0
        //gte(greater than or equal) gte:0
        //lt(less than) lt:0
        //lte(less than or equal ) lte:0
        //integer| >0

        //date - tikrina ar data
        //date_equals -tikrina ar data lygi
        //before - tikrina ar data yra ansktesne nei nurodyta
        //before_or_equal -tikrina ar data yra ansktesne nei nurodyta arba lygi
        //after - tikrina ar data yra velesne nei nurodyta
        // after_or_equal - tikrina ar data yra velesne nei nurodyta arba lygi

        // Patikrinti ar ivestas lietuviskas telefono numeris
        
        // +3706 1234567
        
        //+3706
        //86

        // 861234567 - integer, kiek skaitmenu skaiciuje
        

        //regex - simboliu paieska pagal tam tikrus kriterijus/sablonus
		// 'phone' => ["required", 'regex:/(86|\+3706)\d{7}/'],
		
		$request->validate([
			"name" => "required|min:2|max:50|alpha",
			"surname" => "required|min:2|max:50|alpha",
		]);
		
        $author = new Author;
		$author->name = $request->name;
		$author->surname = $request->surname;
	
		
		//$authorImage = new AuthorImage;
		$authorImage_id = (new AuthorImageController)->store($request, 2); 



		
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
		
		if($request->author_newbook){
			$book_title = $request->book_title; //6, MASYVAS
			$total = count($book_title); //6
		  
			for($i=0; $i<$total; $i++) {
			
			//$book = (new BookController)->store($request);
				   $book = new Book;
				   $book->title = $request->book_title[$i];
				   $book->description = $request->book_description[$i];
					$book->author_id = $author->id;
					
				   $book->save();
			}
		}
		return redirect()->route('author.index');
    }


    public function storeval(Request $request)
    {
		$request->validate([
			"name" => "required|min:2|max:50|alpha",
			"surname" => "required|min:2|max:50|alpha",
			"book_title.*" => "required|min:2|max:50|alpha",
			"book_description.*" => "required|min:2|max:566",
		]);
		
        $author = new Author;
		$author->name = $request->name;
		$author->surname = $request->surname;
		$authorImage_id = (new AuthorImageController)->store($request, 2); 
		$author->author_image_id = $authorImage_id; 
		$author->save();
	
	
		if($request->author_newbook){
			$book_title = $request->book_title;
			$total = count($book_title);
		  
			for($i=0; $i<$total; $i++) {

				   $book = new Book;
				   $book->title = $request->book_title[$i];
				   $book->description = $request->book_description[$i];
					$book->author_id = $author->id;
					
				   $book->save();
			}
		}
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
	
	
	public function search(Request $request){
		
		//$authors = Author::where('id', '=', 34)->get(); id=34
		$search_key = $request->search_key;
		
		$authors = Author::where('surname', 'LIKE', '%'.$search_key.'%')
		->orWhere('name', 'LIKE', '%'.$search_key.'%')
		->orWhere('id', 'LIKE', '%'.$search_key.'%')
		->get(); // id turi 3; 
		
		return view('authors.search', ['authors'=>$authors]);
		
	}
}
