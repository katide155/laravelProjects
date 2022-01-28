@extends('layouts.app')



@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Image</div>
    
                    <div class="card-body">
    
                            <div class="row mb-3">
    
                                <div class="col-md-12">
									@foreach($profilemages as $profilemage)
									<img src="{{'/images/profile-images/'.$profilemage->src}}" width="{{$profilemage->width}}" height="{{$profilemage->height}}" alt="{{$profilemage->alt}}"/>
									@endforeach
                                </div>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection