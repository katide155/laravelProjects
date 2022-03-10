@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	  <div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Edit article data</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
			  <div class="modal-body">
				<input type="hidden" id="edit_article_id" name="article_id" />
				<div class="row g-3 align-items-center">
				  <div class="col-5">
					<label for="article_title" class="col-form-label">Article title</label>
				  </div>
				  <div class="col-7">
					<input type="text" id="edit_article_title" name="article_title" class="form-control">
				  </div>
				</div>
			  </div>

			  <div class="modal-body">
				<div class="row g-3 align-items-center">
				  <div class="col-5">
					<label for="article_description" class="col-form-label">Article description</label>
				  </div>
				  <div class="col-7">
					<input type="textarea" id="edit_article_description" name="article_description" class="form-control">
				  </div>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
				<button class="btn btn-success edit_article" type="submit" name="edit_article" id="edit_article">Edit</button>
			  </div>
		</div>
	  </div>
	</div>	
</div>	
@endsection