@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Article types list</h2>
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

			<table class="table table-success table-striped" id="types_table">

			<thead>
			  <tr>
				<th style="width: 40px;">Article type ID</th>
				<th style="width: 200px;">Article type title</th>
				<th >Article type description</th>
				<th style="width: 180px;">
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#typeModal">Add article type</button>
				</th>
			  </tr>
			</thead>
			<tbody>
			<?php $i=1; ?>
			@foreach ($types as $type)
			  <tr class="type{{$type->id}}">
				<td class="col-type-id">{{$type->id}}</td>
				<td class="col-type-title" style="text-align: left;">{{$type->title}}</td>
				<td class="col-type-description" style="text-align: left;">{{$type->description}}</td>
				<td style="text-align: right;">
					<button data-type-id="{{$type->id}}" type="button" class="btn btn-success dbfl edit-type" data-bs-toggle="modal" data-bs-target="#typeEditModal">ed</button>
	
					<button data-type-id="{{$type->id}}" type="submit" name="delete_type" class="btn btn-danger dbfl delete-type">dl</button>

					<button data-type-id="{{$type->id}}" type="button" class="btn btn-primary dbfl show-type" data-bs-toggle="modal" data-bs-target="#typeShowModal">sh</button>
				</td>
			  </tr>
			  
			@endforeach

			</tbody>
			</table>
			
				<table class="template d-none">
				  <tr >
					<td class="col-type-id"></td>
					<td class="col-type-title" style="text-align: left;"></td>
					<td class="col-type-description" style="text-align: left;"></td>
					<td class="col-type-type-id" style="text-align: left;"></td>
					
					<td style="text-align: right;">
						<button type="button" class="btn btn-success dbfl edit-type" data-bs-toggle="modal" data-bs-target="#typeEditModal">ed</button>
						<button type="button" class="btn btn-danger dbfl delete-type" name="delete_type" >dl</button>
						<button type="button" class="btn btn-primary dbfl show-type" data-bs-toggle="modal" data-bs-target="#typeShowModal">sh</button>
					</td>
				  </tr>					
				</table>
			
				<div class="modal fade" id="typeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">type data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="type_title" class="col-form-label">type title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="type_title" name="type_title" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="type_description" class="col-form-label">type description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="type_description" name="type_description" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Uždaryti</button>
							<button class="btn btn-success" type="submit" name="save_type" id="save_type">Save</button>
						  </div>
					</div>
				  </div>
				</div>
				


				<div class="modal fade" id="typeEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit type data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<input type="hidden" id="edit_type_id" name="type_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="type_title" class="col-form-label">type title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="edit_type_title" name="type_title" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="type_description" class="col-form-label">type description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="edit_type_description" name="type_description" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-success type" type="submit" name="edit_type" id="edit_type">Edit</button>
						  </div>
					</div>
				  </div>
				</div>


				<div class="modal fade" id="typeShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">type data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								type id: 
							  </div>
							  <div class="col-7 show-type-id">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								type title: 
							  </div>
							  <div class="col-7 show-type-title">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								type description:
							  </div>
							  <div class="col-7 show-type-description">
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
				
				function createRowFromHtml(typeId, typeTitle, typeDescription){
					$(".template tr").addClass('article'+articleId);
					$(".template .delete-article").attr('data-article-id', articleId);
					$(".template .show-article").attr('data-article-id', articleId);
					$(".template .edit-article").attr('data-article-id', articleId);
					$(".template .col-article-id").html(articleId);
					$(".template .col-article-title").html(articleTitle);
					$(".template .col-article-description").html(articleDescription);
					$(".template .col-article-type-id").html(articleType);
					return $(".template tbody").html();
				}
				
				
				
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
							
						
							let tablerow = createRowFromHtml(data.article_id, data.article_title, data.article_description, data.article_type);
							
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
				
				
				$(document).on('click', '.delete-type', function(){	
				
					let type_id;
					type_id = $(this).attr('data-type-id');
					
						$.ajax({
						type: 'POST',
						url: '/types/destroyAjax/' + type_id,
						success: function(data){
							$('#alert').removeClass("d-none");
							if($.isEmptyObject(data.error_message)){
								$('#alert').removeClass('alert-danger');
								$('#alert').addClass('alert-success');
								$('#alert').html(data.success_message);	
								$('.type'+type_id).remove();								
							}else{
								$('#alert').removeClass('alert-success');
								$('#alert').addClass('alert-danger');
								$('#alert').removeClass('d-none');
								$('#alert').html(data.error_message);
							}
							
							
						}
						
					});
					
				});
				
				
				$(document).on('click', '.show-type', function(){	
				
					let type_id;
					type_id = $(this).attr('data-type-id');
					
						$.ajax({
						type: 'GET',
						url: '/articles/showAjax/' + type_id,
						success: function(data){
							$('.show-type-id').html(data.type_id);
							$('.show-type-title').html(data.article_title);
							$('.show-type-description').html(data.article_description);
							$('.show-type-type-id').html(data.article_type);
						}
						
					});
					
				});
				
				
				$(document).on('click', '.edit-type', function(){	
				
					let type_id;
					type_id = $(this).attr('data-type-id');
					
						$.ajax({
						type: 'GET',
						url: '/types/showAjax/' + type_id,
						success: function(data){
							$('#edit_type_id').val(data.type_id);
							$('#edit_type_title').val(data.type_title);
							$('#edit_type_description').val(data.type_description);
						}
						
					});
					
				});
				
		
				//$(document).on('click', '#edit_article', function(){
				$('#edit_type').click(function(){
					
					let type_id;
					let type_title;
					let type_description;
					
					type_id = $('#edit_type_id').val();
					type_title = $('#edit_type_title').val();
					type_description = $('#edit_type_description').val();
					
						$.ajax({
						type: 'POST',
						url: '/types/updateAjax/' + type_id,
						data: {type_title:type_title, type_description:type_description},
						success: function(data){
							
							$('.type' + type_id + " " + ".col-type-title").html(data.type_title);
							$('.type' + type_id + " " + ".col-type-description").html(data.type_description);
							
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							
							$('#typeEditModal').hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('body').css({overflow:'auto'});			
							
							
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