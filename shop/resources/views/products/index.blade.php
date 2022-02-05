@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Produktų sąrašas</h2>
		</div>
	</div>
	
	@if(session()->has('error_message'))
		<div class="alert alert-danger">
			{{session()->get('error_message')}}
		</div>
	@endif
	@if(session()->has('success_message'))
		<div class="alert alert-success">
			{{session()->get('success_message')}}
		</div>
	@endif
	<div class="row">
	<div class="col-6">
				<form action="{{route('product.index')}}" method="get"> 
				@csrf
				<select name="sortCol">
					@foreach($selectArray as $key=>$item)
						@if($item == $sortCol || (empty($sortCol) && $key==0))
						<option value="{{$item}}" selected>{{$item}}</option>
						@else
						<option value="{{$item}}">{{$item}}</option>
						@endif
					@endforeach
				</select>
				<select name="sortOrd">
					@if ($sortOrd == 'asc' || empty($sortOrd))
					<option value="asc" selected>Didėjimo</option>
					<option value="desc">Mažėjimo</option>
					@else
					<option value="asc">Didėjimo</option>
					<option value="desc" selected>Mažėjimo</option>
					@endif
				</select>
				<button type="submit">Rikiuoti</button>
			</form>
		</div>
		<div class="col-6">
			<form action="{{route('product.filter')}}" method="get"> 
				@csrf
				<select name="category_id">
					@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->title}}</option>
					@endforeach
				</select>
				<button type="submit">Ieškoti</button>
			</form>
	</div>
	</div>
	<div class="row">
	
		<div class="col-12">

			<table class="table table-success table-striped">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 40px;">ID</th>
				<th style="width: 200px;">Produkto pavadinimas</th>
				<th style="width: 100px;">Produkto kaina</th>
				<th>Produkto aprašymas</th>
				<th style="width: 40px;">Kategorija</th>
				<th style="width: 200px;">Paveikslėlis</th>
				<th><a class="btn btn-success dbfl" href="{{route('product.create')}}">Naujas produktas</a></th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($products as $product)
			  <tr>
				<td>{{ $i++; }}</td>
				<td>{{$product->id}}</td>
				<td style="text-align: left;">{{$product->title}}</td>
				<td style="text-align: left;">{{$product->price}}</td>
				<td style="text-align: left;">{{$product->description}}</td>
				<td style="text-align: left;">{{$product->productCategory->title}}</td>
				<td>
				<img src="{{$product->image_url}}" width="100" height="30" alt="hhhh"/>
				<img src="{{'/images/product-images/'.$product->productImage->src}}" width="{{$product->productImage->width}}" height="{{$product->productImage->height}}" alt="{{$product->productImage->alt}}"/>
				</td>
				<td style="text-align: right;">
					<a class="btn btn-success dbfl" href="{{route('product.edit',[$product])}}">edit</a>
					<div class="dbfl">
					<form method="post" action="{{route('product.destroy',[$product])}}">
						@csrf
						<button type="submit" name="delete_type" class="btn btn-danger"><b>-</b></button>
					</form>
					</div>
					<a class="btn btn-primary dbfl" href="{{route('product.show',[$product])}}">rod</a>
				</td>
				
			  </tr>
			  
			@endforeach
				</tbody>
			</table>
			<span>
			{{$products->links()}}
			</span>
		</div>
	</div>	
</div>	
@endsection