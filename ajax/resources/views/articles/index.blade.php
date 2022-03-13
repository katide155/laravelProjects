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
				@foreach ($articles as $article)
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
				@endforeach
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
								@foreach ($articleTypes as $articleType)
									<option value="{{$articleType->id}}">{{$articleType->title}}</option>
								@endforeach
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
								<select class="form-select" aria-label=".form-select-sm example" name="article_type_id" id="edit_article_type_id">
								@foreach ($articleTypes as $articleType)
									<option class="article{{$articleType->id}}" value="{{$articleType->id}}">{{$articleType->title}}</option>
								@endforeach
								</select>
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
			
			$.ajaxSetup({
				
				headers:{
					"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
				}
				
			});
			
			$(document).ready(function(){
				
				$('[type=checkbox]').prop("checked", false);
				
					// $(".col-article-checked").each(function() {
						// $(this).attr('checked',false);
					// });	
				
				function createRowFromHtml(articleId, articleTitle, articleDescription, articleType){
					$(".template tr").removeAttr("class");
					$(".template tr").addClass('article'+articleId);
					$(".template .delete-article").attr('data-article-id', articleId);
					$(".template .show-article").attr('data-article-id', articleId);
					$(".template .edit-article").attr('data-article-id', articleId);
					$(".template .col-article-id").html(articleId);
					$(".template .col-article-title").html(articleTitle);
					$(".template .col-article-description").html(articleDescription);
					$(".template .col-article-type-id").html(articleType);
					$(".template .col-article-checked").val(articleId);
					return $(".template tbody").html();
				}
				
				$('#create_article').click(function(){
					
					$('.is-invalid').removeClass('is-invalid');
					
				});
				
				$('#save_article').click(function(){
					let article_title;
					let article_description;
					let article_type_id;
					
					article_title = $('#article_title').val();
					article_description = $('#article_description').val();
					article_type_id = $('#article_type_id').val();
					//console.log(article_title + " " + article_description + article_type_id);
					
					let sort;
					let direction;
					
					sort = $("#hidden-sort").val();
					direction = $("#hidden-direction").val();
					
				
					$.ajax({
						type: 'POST',
						url: '{{route("article.storeAjax")}}',
						data: {article_title:article_title, article_description:article_description, article_type_id:article_type_id, sort:sort, direction: direction},
						success: function(data){
							
							if($.isEmptyObject(data.error_message)){
								let tablerow;
								$("#articles_table tbody" ).html('');
								$.each(data.articles, function(key, article){
									tablerow = createRowFromHtml(article.id, article.title, article.description, article.article_type.title);
									
									$('#articles_table tbody').append(tablerow);
									
								});							

								$('#alert').removeClass("d-none");
								$('#alert').html(data.success_message);
								
								$('#articleModal').hide();
								$('body').removeClass('modal-open');
								$('.modal-backdrop').remove();
								$('body').css({overflow:'auto'});
								
								$('#article_title').val('');
								$('#article_description').val('');
								$('#article_type_id').val('');
							}else{
								console.log(data.error_message);
								console.log(data.errors);
								$('.is-invalid').removeClass('is-invalid');
								$.each(data.errors, function(key, error){
									//console.log(key);
									$('#'+key).addClass('is-invalid');
									$('.input_'+key).html(error);
								});
							}
							

						}
						
					});
				});
				
				
				$(document).on('click', '.delete-article', function(){	
				
					let article_id;
					article_id = $(this).attr('data-article-id');
					
						$.ajax({
						type: 'POST',
						url: '/articles/destroyAjax/' + article_id,
						success: function(data){
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							$('.article'+article_id).remove();
						}
						
					});
					
				});
				
				
				
				
				$(document).on('click', '.show-article', function(){	
				
					let article_id;
					article_id = $(this).attr('data-article-id');
					
						$.ajax({
						type: 'GET',
						url: '/articles/showAjax/' + article_id,
						success: function(data){
							$('.show-article-id').html(data.article_id);
							$('.show-article-title').html(data.article_title);
							$('.show-article-description').html(data.article_description);
							$('.show-article-type-id').html(data.article_type);
						}
						
					});
					
				});
				
				
				$(document).on('click', '.edit-article', function(){	
				
					let article_id;
					article_id = $(this).attr('data-article-id');
					
						$.ajax({
						type: 'GET',
						url: '/articles/showAjax/' + article_id,
						success: function(data){
							$('#edit_article_id').val(data.article_id);
							$('#edit_article_title').val(data.article_title);
							$('#edit_article_description').val(data.article_description);
							$('#edit_article_type_id option').removeAttr('selected');
							$('#edit_article_type_id').val(data.article_type_id);
							$('#edit_article_type_id .article'+data.article_type_id).attr("selected", "selected");
						}
						
					});
					
				});
				
		
				//$(document).on('click', '#edit_article', function(){
				$('#edit_article').click(function(){
					
					let article_id;
					let article_title;
					let article_description;
					let article_type_id;
					
					article_id = $('#edit_article_id').val();
					article_title = $('#edit_article_title').val();
					article_description = $('#edit_article_description').val();
					article_type_id = $('#edit_article_type_id').val();
					
						$.ajax({
						type: 'POST',
						url: '/articles/updateAjax/' + article_id,
						data: {article_title:article_title, article_description:article_description, article_type_id:article_type_id},
						success: function(data){
							
							$('.article' + article_id + " " + ".col-article-title").html(data.article_title);
							$('.article' + article_id + " " + ".col-article-description").html(data.article_description);
							$('.article' + article_id + " " + ".col-article-type-id").html(data.article_type);
							
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							
							$('#articleEditModal').hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('body').css({overflow:'auto'});			
							
							
						}
						
					});
					
				});					
					
					
				$('.article-sort').click(function(){
					let sort;
					let direction;
					
					sort = $(this).attr('data-sort');
					direction = $(this).attr('data-direction');
					
					$("#hidden-sort").val(sort);
					$("#hidden-direction").val(direction);
					
					if(direction == 'asc'){
						$(this).attr('data-direction', 'desc');
					}else{
						$(this).attr('data-direction', 'asc');
					}
					
						$.ajax({
						type: 'GET',
						url: '{{route("article.indexAjax")}}',
						data: {sort:sort, direction: direction},
						success: function(data){
							//console.log(data.articles);
							let tablerow;
							$("#articles_table tbody" ).html('');
							$.each(data.articles, function(key, article){
								//console.log(article.article_type.title);
								tablerow = createRowFromHtml(article.id, article.title, article.description, article.article_type.title);
								
								$('#articles_table tbody').append(tablerow);
								
							});
							
							console.log(tablerow);
						}
					});						
				});

				//$('#submitSearch').click(function(){
				$(document).on('input', '#searchValue', function(){	
					let searchValue = $('#searchValue').val();
					
					let searchFieldCount = searchValue.length;
					console.log(searchFieldCount);
					if(searchFieldCount == 0){
						$('.search-feedback').css('display', 'block');
						$('.search-feedback').html('Search field is empty!');
					}else if(searchFieldCount != 0 && searchFieldCount < 3 ){
						$('.search-feedback').css('display', 'block');
						$('.search-feedback').html('Need to write more than 3 symbols!');						
					}else{
						$('.search-feedback').css('display', 'none');
						$.ajax({
							type: 'GET',
							url: '{{route("article.searchAjax")}}',
							data: {searchValue: searchValue},
							success: function(data){
								
								if($.isEmptyObject(data.error_message)){
									let tablerow;
									$("#articles_table" ).show();
									$('#alert').addClass('d-none');
									$("#articles_table tbody" ).html('');
									$.each(data.articles, function(key, article){
										tablerow = createRowFromHtml(article.id, article.title, article.description, article.type_id);
										
										$('#articles_table tbody').append(tablerow);
										
									});		
								}else{
									$("#articles_table" ).hide();
									$('#alert').removeClass('alert-success');
									$('#alert').addClass('alert-danger');
									$('#alert').removeClass('d-none');
									$('#alert').html(data.error_message);
								}
							}
							
						});
					
					}
				});
				

				
				$('#deleteSelectedArticles').click(function(){
					let deletionList = [];
					
					 $("input:checked").each(function() {
							deletionList.push($(this).val());
						});
					
					console.log(deletionList);
					
					
					$.ajax({
						type: 'POST',
						url: '{{route("article.destroyAjaxMany")}}',
						data: {deletionList:deletionList},
						success: function(data){
							let tablerow;
							$("#articles_table tbody" ).html('');
							$.each(data.articles, function(key, article){
								tablerow = createRowFromHtml(article.id, article.title, article.description, article.article_type.title);
								
								$('#articles_table tbody').append(tablerow);
								$('#alert').removeClass("d-none");
								$('#alert').html(data.success_message);
								
							});

						}
						
					});
					

					
				});
				
			});
			
//console.log('labas');
			</script>


		</div>
	</div>	
</div>	
@endsection