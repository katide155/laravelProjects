@extends('layouts.app')

@section('content')

<div class="container">

  <div class="modal-dialog big-modal modal-dialog-centered">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Produkto duomenys</h5>
	  </div>
	<form action="{{route('product.update' ,[$product])}}" method="POST" enctype="multipart/form-data">
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="title" class="col-form-label">Pavadinimas</label>
		  </div>
		  <div class="col-7">
			<input type="text" id="title" name="title" class="form-control" value="{{$product->title}}">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="price" class="col-form-label">Kaina</label>
		  </div>
		  <div class="col-7">
			<input type="text" id="price" name="price" class="form-control" value="{{$product->price}}">
		  </div>
		</div>
	  </div>
	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="description" class="col-form-label">Aprašymas</label>
		  </div>
		  <div class="col-7">
			<textarea type="textarea" id="description" name="description" class="form-control">{{$product->description}}</textarea>
		  </div>
		</div>
	  </div>
	  
	<div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="category_id" class="col-form-label">Kategorija</label>
		  </div>
		  <div class="col-7">
			<select class="form-select" name="category_id">
				@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->title}}</option>
				@endforeach
			</select>
		  </div>
		</div>
	  </div>  

 	  <div class="modal-body">
		<div class="row g-3 align-items-center">
		  <div class="col-4">
			<label for="product_image" class="col-form-label">Produkto paveikslėlis</label>
		  </div>
		  <div class="col-7">
			<img src="{{'/images/product-images/'.$product->productImage->src}}" width="{{$product->productImage->width}}" height="{{$product->productImage->height}}" alt="{{$product->productImage->alt}}"/>
		  </div>
		</div>
	  </div>
	  
		<div class="row mb-3">
			<label for="image_alt" class="col-md-4 col-form-label text-md-end">Image Alt</label>

			<div class="col-md-6">
				<input id="image_alt" type="text" class="form-control" name="image_alt" required autofocus value="{{$product->productImage->alt}}">

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_src" class="col-md-4 col-form-label text-md-end">Image Src</label>

			<div class="col-md-6">
				<input id="image_src" type="file" class="form-control" name="image_src" value="{{$product->productImage->src}}">

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_width" class="col-md-4 col-form-label text-md-end">Image Width</label>

			<div class="col-md-6">
				<input id="image_width" min="0" max="200" step="10" type="number" class="form-control" name="image_width" autofocus value="{{$product->productImage->width}}">

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_height" class="col-md-4 col-form-label text-md-end">Image Height</label>

			<div class="col-md-6">
				<input id="image_height" min="0" max="200" step="10" type="number" class="form-control" name="image_height" autofocus value="{{$product->productImage->height}}">

			</div>
		</div>

		<div class="row mb-3">
			<label for="image_class" class="col-md-4 col-form-label text-md-end">Image Class</label>

			<div class="col-md-6">
				<input id="image_class" type="text" class="form-control" name="image_class" autofocus value="{{$product->productImage->class}}">
			</div>
		</div>	  
	@csrf  
	  <div class="modal-footer">
		<a class="btn btn-secondary" href="{{route('product.index')}}">Grįžti</a>
		<button class="btn btn-success" type="submit" name="save_group">Saugoti</button>
	  </div>
	</form>
	</div>
  </div>

</div>

@endsection