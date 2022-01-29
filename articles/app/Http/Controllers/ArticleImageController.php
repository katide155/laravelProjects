<?php

namespace App\Http\Controllers;

use App\Models\ArticleImage;
use App\Http\Requests\StoreArticleImageRequest;
use App\Http\Requests\UpdateArticleImageRequest;

class ArticleImageController extends Controller
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
     * @param  \App\Http\Requests\StoreArticleImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleImage $articleImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArticleImageRequest  $request
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleImageRequest $request, ArticleImage $articleImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleImage  $articleImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleImage $articleImage)
    {
        //
    }
}
