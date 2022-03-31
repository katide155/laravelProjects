@extends('layouts.app')

@section('content')

<style>
.article-sort{
	cursor:pointer;
}

.article-sort:hover{
	color:blue;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Article list</h2>
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
		
		<div class="col-12">
			<div id="alert" class="alert alert-success d-none">
			</div>
							
			<div class="searchAjaxForm">				
				<input id="searchValue" type="text"/>
				<span class="search-feedback"></span>
				<button type="button" id="submitSearch">Search</button>
			</div>
			
			
			<input id="hidden-sort" type="hidden" value="id"/> 
			<input id="hidden-direction" type="hidden" value="asc"/> 

		<table class="table table-success table-striped" id="articles_table">
			<thead>
				<tr>
					<th style="width: 40px;">
						<div class="article-sort" class="btn btn-success" data-sort="id" data-direction="asc">ID</div>
					</th>
					<th style="width: 200px;">
						<div class="article-sort" class="btn btn-success" data-sort="title" data-direction="asc">Article title</div>
					</th>
					<th >
						<div class="article-sort" class="btn btn-success" data-sort="description" data-direction="asc">Description</div>
					</th>
					<th style="width: 200px;">
						<div class="article-sort" class="btn btn-success" data-sort="articleType.title" data-direction="asc">Article type</div>
					</th>
					<th style="width: 180px;">
						<button type="button" class="btn btn-success" id="create_article" data-bs-toggle="modal" data-bs-target="#articleModal">Add article</button>
					</th>
					<th style="width: 40px;"><button type="button" class="btn btn-success" id="deleteSelectedArticles">Delete selected</button></th>
				</tr>
			</thead>
			<tbody>
			{{--	@foreach ($articles as $article)
				<tr class="article{{$article->id}}">
					<td class="col-article-id">{{$article->id}}</td>
					<td class="col-article-title" style="text-align: left;">{{$article->title}}</td>
					<td class="col-article-description" style="text-align: left;">{{$article->description}}</td>
					<td class="col-article-type-id" style="text-align: left;">{{$article->articleType->title}}</td>
					
					<td style="text-align: right;">
						<button data-article-id="{{$article->id}}" type="button" class="btn btn-success dbfl edit-article" data-bs-toggle="modal" data-bs-target="#articleEditModal">ed</button>
		
						<button data-article-id="{{$article->id}}" type="submit" name="delete_client" class="btn btn-danger dbfl delete-article">dl</button>

						<button data-article-id="{{$article->id}}" type="button" class="btn btn-primary dbfl show-article" data-bs-toggle="modal" data-bs-target="#articleShowModal">sh</button>
					</td>
					<td><input class="form-check-input col-article-checked" value="{{$article->id}}" name="delete_article[]" type="checkbox"/></td>
				</tr>
			@endforeach--}}
			</tbody>
		</table>
			
		<table class="template d-none">
			<tr >
				<td class="col-article-id"></td>
				<td class="col-article-title" style="text-align: left;"></td>
				<td class="col-article-description" style="text-align: left;"></td>
				<td class="col-article-type-id" style="text-align: left;"></td>

				<td style="text-align: right;">
					<button type="button" class="btn btn-success dbfl edit-article" data-bs-toggle="modal" data-bs-target="#articleEditModal">ed</button>
					<button type="button" class="btn btn-danger dbfl delete-article" name="delete_client" >dl</button>
					<button type="button" class="btn btn-primary dbfl show-article" data-bs-toggle="modal" data-bs-target="#articleShowModal">sh</button>
				</td>
				<td><input class="form-check-input col-article-checked" name="delete_article[]" type="checkbox"/></td>
			</tr>					
		</table>
			
				<div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Article data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
						  

							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="article_title" class="col-form-label">Article title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="article_title" name="article_title" class="form-control">
								<span class="invalid-feedback input_article_title">Article title field is required</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="article_type_id" class="col-form-label">Article type</label>
							  </div>
							  <div class="col-7">
								<select class="form-select" aria-label=".form-select-sm example" name="article_type_id" id="article_type_id">
								{{--	@foreach ($articleTypes as $articleType)
									<option value="{{$articleType->id}}">{{$articleType->title}}</option>
								@endforeach--}}
								</select>
								<span class="invalid-feedback input_article_type_id">Article title field is required</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="article_description" class="col-form-label">Article description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="article_description" name="article_description" class="form-control">
								<span class="invalid-feedback input_article_description">Article title field is required</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Uždaryti</button>
							<button class="btn btn-success" type="submit" name="save_article" id="save_article">Saugoti</button>
						  </div>
					</div>
				  </div>
				</div>
				


				<div class="modal fade" id="articleEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<label for="article_type_id" class="col-form-label">Article type</label>
							  </div>
							  <div class="col-7">
							  {{--	<select class="form-select" aria-label=".form-select-sm example" name="article_type_id" id="edit_article_type_id">
								@foreach ($articleTypes as $articleType)
									<option class="article{{$articleType->id}}" value="{{$articleType->id}}">{{$articleType->title}}</option>
								@endforeach
							  </select>--}}
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


				<div class="modal fade" id="articleShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Article data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Article id: 
							  </div>
							  <div class="col-7 show-article-id">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Article title: 
							  </div>
							  <div class="col-7 show-article-title">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Article type: 
							  </div>
							  <div class="col-7 show-article-type-id">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Article description:
							  </div>
							  <div class="col-7 show-article-description">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal">Uždaryti</button>
						  </div>
					</div>
				  </div>
				</div>
		
			<script>
			

			</script>


		</div>
	</div>	
</div>	
@endsection