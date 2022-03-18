<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Client side</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
 <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <!-- Styles -->


    </head>
    <body class="antialiased">
        
        <div class="container">
            <table class="table table-stripped" id="clients">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Surname</th>
						<th>Description</th>
						<th><button type="button" class="btn btn-success" id="create-client" data-bs-toggle="modal" data-bs-target="#createClientModal">Create client</button></th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		
			

			<div class="button-container">
			</div>
			
		<table class="template d-none">
			<tr >
				<td class="col-article-id"></td>
				<td class="col-article-title" style="text-align: left;"></td>
				<td class="col-article-description" style="text-align: left;"></td>
				<td class="col-article-type-id" style="text-align: left;"></td>

				<td style="text-align: right;">
					<button type="button" class="btn btn-success dbfl edit-client" data-bs-toggle="modal" data-bs-target="#editClientModal">ed</button>
					<button type="button" class="btn btn-danger dbfl delete-client" name="delete_client" >dl</button>
					<button type="button" class="btn btn-primary dbfl show-client" data-bs-toggle="modal" data-bs-target="#showClientModal">sh</button>
				</td>
			</tr>					
		</table>
        </div>
		
		<div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Create new client</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<input type="hidden" id="edit_article_id" name="article_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_name" class="col-form-label">client_name</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="client_name" name="client_name" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<input type="hidden" id="edit_article_id" name="article_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_surname" class="col-form-label">client_surname</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="client_surname" name="client_surname" class="form-control">
							  </div>
							</div>
						  </div>
						  {{-- <div class="modal-body">
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
						  </div>--}}
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_description" class="col-form-label">client_description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="client_description" name="client_description" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-success save_client" type="submit" name="edit_article" id="save_client">Save</button>
						  </div>
					</div>
				  </div>
				</div>
				
				
						<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit client data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<input type="hidden" id="edit_client_id" name="client_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_name" class="col-form-label">client_name</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="edit_client_name" name="client_name" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_surname" class="col-form-label">client_surname</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="edit_client_surname" name="client_surname" class="form-control">
							  </div>
							</div>
						  </div>
						  {{-- <div class="modal-body">
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
						  </div>--}}
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_description" class="col-form-label">client_description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="edit_client_description" name="client_description" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-success save_client" type="submit" name="edit_article" id="edit_client">Save</button>
						  </div>
					</div>
				  </div>
				</div>
				
				
				<div class="modal fade" id="showClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Client data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Client id: 
							  </div>
							  <div class="col-7 show_client_id">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Client name: 
							  </div>
							  <div class="col-7 show_client_name">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Client surname: 
							  </div>
							  <div class="col-7 show_client_surname">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Client description:
							  </div>
							  <div class="col-7 show_client_description">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeModal">Uždaryti</button>
						  </div>
					</div>
				  </div>
				</div>
		
    </body>
	
	<script>
	
		function createRowFromHtml(clientId, clientName, clientSurname, clientDescription){
			$(".template tr").removeAttr("class");
			$(".template tr").addClass('client'+clientId);
			$(".template .delete-client").attr('data-client-id', clientId);
			$(".template .show-client").attr('data-client-id', clientId);
			$(".template .edit-client").attr('data-client-id', clientId);
			$(".template .col-article-id").html(clientId);
			$(".template .col-article-title").html(clientName);
			$(".template .col-article-description").html(clientSurname);
			$(".template .col-article-type-id").html(clientDescription);
			return $(".template tbody").html();
		}
		
		$(document).ready(function(){
			
			console.log('veikia');
			
		})
		
		let csrf = '123456789';//$('meta[name="csrf-token"]').attr('content');
		
	
		$(document).on('click', '.button-container button', function(){	
		
			let page = $(this).attr('data-page');
			
			$.ajax({
				type: 'GET',
				url: page,
				data: {csrf:csrf},
				success: function(data){
					console.log(data);
					
					$("#clients tbody" ).html('');
					$(".button-container" ).html('');
					
					$.each(data.data, function(key, client){
						tablerow = createRowFromHtml(client.id, client.name, client.surname, client.description);
						
						$('#clients tbody').append(tablerow);
						
					
					});
					
					$.each(data.links, function(key, link){
						
						let button;
						if(link.url != null){
							if(link.active == true)
							{
								button = "<button class='btn btn-primary active' type='button' data-page='"+link.url+"' >"+link.label+"</button>";
							}
							else{
								button = "<button class='btn btn-primary' type='button' data-page='"+link.url+"' >"+link.label+"</button>";	
							}
							
						}
							$('.button-container').append(button);
						
						
					});	
					
				}
				
			});
		});
		
		$.ajax({
			type: 'GET',
			url: 'http://127.0.0.1:8000/api/clients',
			data: {csrf:csrf},
			success: function(data){
				console.log(data);
				
					$("#clients tbody" ).html('');
					
					$.each(data.data, function(key, client){
						tablerow = createRowFromHtml(client.id, client.name, client.surname, client.description);
						
						$('#clients tbody').append(tablerow);
						
					});	
					
					$.each(data.links, function(key, link){
						
						let button;
						if(link.url != null){
						if(link.active == true)
							{
								button = "<button class='btn btn-primary active' type='button' data-page='"+link.url+"' >"+link.label+"</button>";
							}
							else{
								button = "<button class='btn btn-primary' type='button' data-page='"+link.url+"' >"+link.label+"</button>";	
							}
						}
						$('.button-container').append(button);
						
					});	
			}
			
		});
		
		
		$(document).on('click', '#save_client', function(){	
		
			let client_name = $('#client_name').val();
			let client_surname = $('#client_surname').val();
			let client_description = $('#client_description').val();
	
		
			$.ajax({
				type: 'POST',
				url: 'http://127.0.0.1:8000/api/clients',
				data: {client_name:client_name,client_surname:client_surname, client_description:client_description},
				success: function(data){
					
					$('#createClientModal').hide();
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('body').css({overflow:'auto'});
					console.log(data);
						
				}
				
			});
			
			$.ajax({
				type: 'GET',
				url: 'http://127.0.0.1:8000/api/clients',
				data: {csrf:csrf},
				success: function(data){
					console.log(data);
									
						$(".button-container" ).html('');
						$("#clients tbody" ).html('');
						
						$.each(data.data, function(key, client){
							tablerow = createRowFromHtml(client.id, client.name, client.surname, client.description);
							
							$('#clients tbody').append(tablerow);
							
						});	
						
						$.each(data.links, function(key, link){
							
							let button;
							if(link.url != null){
							if(link.active == true)
								{
									button = "<button class='btn btn-primary active' type='button' data-page='"+link.url+"' >"+link.label+"</button>";
								}
								else{
									button = "<button class='btn btn-primary' type='button' data-page='"+link.url+"' >"+link.label+"</button>";	
								}
							}
							$('.button-container').append(button);
							
						});	
				}
				
			});
		
		});
		
		$(document).on('click', '#edit_client', function(){	
		
			let client_name = $('#edit_client_name').val();
			let client_surname = $('#edit_client_surname').val();
			let client_description = $('#edit_client_description').val();
			let clientId = $('#edit_client_id').val();
		console.log(clientId);
			$.ajax({
				type: 'PUT',
				url: 'http://127.0.0.1:8000/api/clients/'+clientId,
				data: {csrf:csrf, client_name:client_name,client_surname:client_surname, client_description:client_description},
				success: function(data){
					
					$('#editClientModal').hide();
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('body').css({overflow:'auto'});
					console.log(data);
						
				}
				
			});
		
		});

		$(document).on('click', '.edit-client', function(){	

			let	clientId = $(this).attr('data-client-id');
		
			$.ajax({
				type: 'GET',
				url: 'http://127.0.0.1:8000/api/clients/'+clientId,
				success: function(data){
					
					$('#edit_client_id').val(data.id);
					$('#edit_client_name').val(data.name);
					$('#edit_client_surname').val(data.surname);
					$('#edit_client_description').val(data.description);
				
				}
			});
		});
		
		$(document).on('click', '.show-client', function(){	

			let	clientId = $(this).attr('data-client-id');
		
			$.ajax({
				type: 'GET',
				url: 'http://127.0.0.1:8000/api/clients/'+clientId,
				success: function(data){
					
							$('.show_client_id').html(data.id);
							$('.show_client_name').html(data.name);
							$('.show_client_surname').html(data.surname);
							$('.show_client_description').html(data.description);
					console.log(data);
						
				}
				
			});
		
		});
		
		$(document).on('click', '.delete-client', function(){	
		

			let	clientId = $(this).attr('data-client-id');
		
			$.ajax({
				type: 'DELETE',
				url: 'http://127.0.0.1:8000/api/clients/'+clientId,
				success: function(data){
					console.log(data);
						
				}
				
			});
		
		});
		
	</script>
</html>
