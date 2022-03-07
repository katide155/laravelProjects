@extends('layouts.app')

@section('content')
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

			<table class="table table-success table-striped" id="articles_table">

			<thead>
			  <tr>
				<th style="width: 40px;">Eil. Nr.</th>
				<th style="width: 200px;">Article title</th>
				<th >Article description</th>
				<th style="width: 200px;">Article type</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#articleModal">Add article</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($articles as $article)
			  <tr class="article{{$article->id}}">
				<td>{{ $i++; }}</td>
				<td style="text-align: left;">{{$article->title}}</td>
				<td style="text-align: left;">{{$article->description}}</td>
				<td style="text-align: left;">{{$article->articleType->title}}</td>
				
				<td style="text-align: right;">
					<button data-article-id="{{$article->id}}" type="button" class="btn btn-success dbfl edit-article" data-bs-toggle="modal" data-bs-target="#articleEditModal">ed</button>
	
					<button data-article-id="{{$article->id}}" type="submit" name="delete_client" class="btn btn-danger dbfl delete-article">dl</button>

					<button data-article-id="{{$article->id}}" type="button" class="btn btn-primary dbfl show-article" data-bs-toggle="modal" data-bs-target="#articleShowModal">sh</button>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
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
									<option value="{{$articleType->id}}">{{$articleType->title}}</option>
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
							<button class="btn btn-success" type="submit" name="edit_article" id="edit_article">Edit</button>
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
							  <div class="col-12 show-article-title">
								Article title: 
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5 show-article-type-id">
								Article type: 
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5 show-article-description">
								Article description
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
				

				
				$('#save_article').click(function(){
					let article_title;
					let article_description;
					let article_type_id;
					
					article_title = $('#article_title').val();
					article_description = $('#article_description').val();
					article_type_id = $('#article_type_id').val();
					//console.log(article_title + " " + article_description + article_type_id);
					
					$.ajax({
						type: 'POST',
						url: '{{route("article.storeAjax")}}',
						data: {article_title:article_title, article_description:article_description, article_type_id:article_type_id},
						success: function(data){
							
							
							let tablerow = "<tr class='article"+data.article_id+"'><td></td><td>" + data.article_title + "</td><td>" + data.article_description + "</td><td>" + data.article_type_id + "</td><td><button data-article-id="+data.article_id+" type='submit' name='delete_client' class='btn btn-danger dbfl delete-article'>dl</button><button type='button' class='btn btn-primary dbfl show-article' data-bs-toggle='modal' data-article-id="+data.article_id+" data-bs-target='#articleShowModal'>sh</button></td></tr>";
							
							$('#articles_table').append(tablerow);
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							
							$('#articleModal').hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('body').css({overflow:'auto'});
							
							$('#article_title').val('');
							$('#article_description').val('');
							$('#article_type_id').val('');
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
							$('.show-article-type-id').html(data.article_type_id);
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
							$('#edit_article_type_id').val(data.article_type_id);
						}
						
					});
					
				});
				
				$('#edit_article').click(function(){
					
					let article_id;
					article_id = $(this).attr('data-article-id');
					
						$.ajax({
						type: 'POST',
						url: '/articles/updateAjax/' + article_id,
						success: function(data){
							$('#edit_article_id').val(data.article_id);
							$('#edit_article_title').val(data.article_title);
							$('#edit_article_description').val(data.article_description);
							$('#edit_article_type_id').val(data.article_type_id);
						}
						
					});
					
				});					
					
					
			});
			
console.log('labas');
			</script>


		</div>
	</div>	
</div>	
@endsection