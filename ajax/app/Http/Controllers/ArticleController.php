<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$articleTypes = Type::all();
		$articles = Article::sortable()->get();
		return view('articles.index', ['articles'=>$articles, 'articleTypes'=>$articleTypes]);
    }

	public function indexAjax(){
		
		$articleTypes = Type::all();
		$articles = Article::with('articleType')->sortable()->get();

		$response_array = array(
            'articles' => $articles
        );

		$jason_response = response()->json($response_array);
		
		return $jason_response;			
		
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new Article;
		$article->title = $request->article_title;
		$article->description = $request->article_description;
		$article->type_id = $request->article_type_id;
		
		$article->save();
		return redirect()->route('article.index');
    }
	
	public function storeAjax(Request $request){
		
		
		$article = new Article;
		$article->title = $request->article_title;
		$article->description = $request->article_description;
		$article->type_id = $request->article_type_id;
		
		$article->save();
		
		$sort = $request->sort;
		$direction = $request->direction;
		
		$articles = Article::with('articleType')->sortable([$sort => $direction])->get();
		
		$article_info = array(
			'success_message' => 'Article saved successfuly',
			'article_title' => $article->title,
			'article_description' => $article->description,
			'article_type_id' => $article->type_id,
			'article_id' => $article->id,
			'article_type' => $article->articleType->title,
			'articles' => $articles,
		);
		
		$jason_response = response()->json($article_info);
		
		return $jason_response;	
	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("articles.index", ['article' => $article]);
    }
    public function showAjax(Article $article)
    {
       		$article_info = array(
			'success_message' => 'Article retrived successfuly',
			'article_title' => $article->title,
			'article_description' => $article->description,
			'article_type_id' => $article->type_id,
			'article_id' => $article->id,
			'article_type' => $article->articleType->title,
		);
		
		$jason_response = response()->json($article_info);
		
		return $jason_response;	
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }
	public function updateAjax(Request $request, Article $article){
		
		$article->title = $request->article_title;
		$article->description = $request->article_description;
		$article->type_id = $request->article_type_id;
		
		$article->save();
		
		$article_info = array(
			'success_message' => 'Article updated successfuly',
			'article_title' => $article->title,
			'article_description' => $article->description,
			'article_type_id' => $article->type_id,
			'article_id' => $article->id,
			'article_type' => $article->articleType->title,
		);
		
		$jason_response = response()->json($article_info);
		
		return $jason_response;	
	}
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleRequest  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
		return redirect()->route('article.index');
    }
	
	public function destroyAjax(Article $article)
    {
        $article->delete();
		$article_info = array(
			'success_message' => 'Article '.$article->title.' deleted successfuly',
 		);
		
		$jason_response = response()->json($article_info);
		
		return $jason_response;
    }
	
	public function searchAjax(Request $request){
		
		$searchValue = $request->searchValue;
		
		$articles = Article::query()
		->where('title', 'like', "%{$searchValue}%")
		->orwhere('description', 'like', "%{$searchValue}%")
		->orwhere('id', 'like', "%{$searchValue}%")
		->get();
		
		if(count($articles) > 0){
			$articles_array = array(
				'articles' => $articles
			);
		}else{
			
			$articles_array = array(
				'error_message' => 'By seach phrase "'.$searchValue.'" no articles where found!'
			);			
			
		}
		

		
		$json_response = response()->json($articles_array);
		
		return $json_response;
		
	}
}
