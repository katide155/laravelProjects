@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Image update</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('profileimage.update',[$profileImage])}}" enctype="multipart/form-data">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="image_alt" class="col-md-4 col-form-label text-md-end">Image Alt</label>
    
                                <div class="col-md-6">
                                    <input id="image_alt" type="text" class="form-control" name="image_alt" required autofocus value="{{$profileImage->alt}}">
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_src" class="col-md-4 col-form-label text-md-end">Image Src</label>
    
                                <div class="col-md-6">
                                    <input id="image_src" type="file" class="form-control" name="image_src" >
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_width" class="col-md-4 col-form-label text-md-end">Image Width</label>
    
                                <div class="col-md-6">
                                    <input id="image_width" min="0" max="200" step="10" type="number" class="form-control" name="image_width" required autofocus value="{{$profileImage->width}}">
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_height" class="col-md-4 col-form-label text-md-end">Image Height</label>
    
                                <div class="col-md-6">
                                    <input id="image_height" min="0" max="200" step="10" type="number" class="form-control" name="image_height" required autofocus value="{{$profileImage->height}}">
    
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="image_class" class="col-md-4 col-form-label text-md-end">Image Class</label>
    
                                <div class="col-md-6">
                                    <input id="image_class" type="text" class="form-control" name="image_class" required autofocus value="{{$profileImage->class}}">
    
                                </div>
                            </div>
    
    
                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection