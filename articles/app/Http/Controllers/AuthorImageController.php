<?php

namespace App\Http\Controllers;

use App\Models\AuthorImage;
use App\Http\Requests\StoreAuthorImageRequest;
use App\Http\Requests\UpdateAuthorImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AuthorImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$authorImages = AuthorImage::all();
        return view('authorimages.index', ['authorimages'=>$authorImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authorimages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorImageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorImage $authorImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorImage $authorImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorImageRequest  $request
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorImageRequest $request, AuthorImage $authorImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthorImage  $authorImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorImage $authorImage)
    {
        //
    }
}
