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
						<th>Events</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		
			
<button type="button" class="btn btn-success" id="create-client" data-bs-toggle="modal" data-bs-target="#createClientModal">Create client</button>
			<button id="page1" data-page="1">1 page</button>
			<div class="button-container">
			</div>
			
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
			</tr>					
		</table>
        </div>
		
		<div class="modal fade" id="createClientModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		
    </body>
	
	<script>
	
		function createRowFromHtml(clientId, clientName, clientSurname, clientDescription){
			$(".template tr").removeAttr("class");
			$(".template tr").addClass('article'+clientId);
			$(".template .delete-article").attr('data-article-id', clientId);
			$(".template .show-article").attr('data-article-id', clientId);
			$(".template .edit-article").attr('data-article-id', clientId);
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
					
					console.log(data);
						
				}
				
			});
		
		});
		
	</script>
</html>
