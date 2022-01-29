@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Authors Images</div>
    
                    <div class="card-body">
    
                            <div class="row mb-3">
    
                                <div class="col-md-12">
									@foreach($authorimages as $authorimage)
									<img src="{{'/images/author-images/'.$authorimage->src}}" width="{{$authorimage->width}}" height="{{$authorimage->height}}" alt="{{$authorimage->alt}}"/>
									@endforeach
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection