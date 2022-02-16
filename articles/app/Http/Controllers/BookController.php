<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\PaginationSettings;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
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
		
		$authors = Author::all()->sortBy('name');
		$tem_book = Book::all();
		$book_columns = array_keys($tem_book->first()->getAttributes());

		if(empty($sortCol) || empty($sortOrd)){
			$books = Book::all();
		}
		else{	
			//
			
			if($sortCol == 'author_id'){
				$sortBool = true;
				
				if($sortOrd == 'asc'){
					$sortBool = false;
				}
			
			$books = Book::get()->sortBy(function($query){
					return $query->bookAuthor->name;
			}, SORT_REGULAR, $sortBool)->all();
			}else{
				$books = Book::orderBy($sortCol, $sortOrd)->get();
			}
		}
		
	
		$selectArray =  $book_columns;
	
		
        return view('books.index', ['books'=>$books,'sortOrd'=>$sortOrd, 'sortCol'=>$sortCol, 'selectArray'=>$selectArray, 'authors'=>$authors]);
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
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
	
	public function filter(Request $request){
		
		$author_id = $request->author_id;
		
		$books = Book::where('author_id', '=', $author_id)->get();
		
		//$books = Book::all();
		return view('books.filter', ['books'=>$books]);
	}
	
	public function pagination(Request $request){
		
		$sortCol = $request->sortCol;
		$sortOrd = $request->sortOrd;
		
		$authors = Author::all()->sortBy('name');
		$tem_book = Book::all();
		$book_columns = array_keys($tem_book->first()->getAttributes());

		if(empty($sortCol) || empty($sortOrd)){
			$books = Book::paginate(15);
		}
		else{	
			$books = Book::orderBy($sortCol, $sortOrd)->paginate(10);

		}
		
	
		$selectArray =  $book_columns;
	

		//$books =  Book::simplePaginate(15); //paprastas puslapiavimas (prev, next)
		//$books =  Book::paginate(15); //pilnas puslapiavimas
		//$books = Book::orderBy('id', 'DESC')->paginate(15);
		
		return view('books.pagination', ['books'=>$books,'sortOrd'=>$sortOrd, 'sortCol'=>$sortCol, 'selectArray'=>$selectArray, 'authors'=>$authors]);
	}
	
		public function sortfilter(Request $request){
		
		$sortCol = $request->sortCol;
		$sortOrd = $request->sortOrd;
		$author_id = $request->author_id;
		$authors = Author::all()->sortBy('name');
		$tem_book = Book::all();
		$book_columns = array_keys($tem_book->first()->getAttributes());
			
		$pages_in_sheet = $request->pages_in_sheet;
			
		if($request->pages_in_sheet == 1)
			$pages_in_sheet = count($tem_book);
			
		if(empty($sortCol) || empty($sortOrd) || empty($author_id)){
			$books = Book::paginate($pages_in_sheet);
		}
		else{	
			if($author_id == 'all'){
				$books = Book::orderBy($sortCol, $sortOrd)->paginate($pages_in_sheet);
			}
			else{
				$books = Book::where('author_id', '=', $author_id)->orderBy($sortCol, $sortOrd)->paginate($pages_in_sheet);
			}
		}
		$pagination = PaginationSettings::where('visible', '=', 1)->get();
		$selectArray =  $book_columns;
		
		return view('books.sortfilter', [
			'books'=>$books,
			'sortOrd'=>$sortOrd, 
			'sortCol'=>$sortCol, 
			'selectArray'=>$selectArray, 
			'authors'=>$authors, 
			'author_id'=>$author_id,
			'pages_in_sheet'=>$request->pages_in_sheet,
			'pagination'=>$pagination]);
	}
	
	public function sortable(){
		
		
		
		$books = Book::where('author_id'
		, '=', 1)->sortable()->paginate();
		return view('books.sortable', ['books'=>$books] );
	}
}
