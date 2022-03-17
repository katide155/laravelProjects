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
		
		
		
	
		$(document).on('click', '.button-container button', function(){	
		
			let page = $(this).attr('data-page');
			
			$.ajax({
				type: 'GET',
				url: page,
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
						
						button = "<button class='btn btn-primary' type='button' data-page='"+link.url+"' >"+link.label+"</button>";
						$('.button-container').append(button);
						
					});	
					
				}
				
			});
		});
		
		$.ajax({
			type: 'GET',
			url: 'http://127.0.0.1:8000/api/clients',
			success: function(data){
				console.log(data);
				
					$("#clients tbody" ).html('');
					
					$.each(data.data, function(key, client){
						tablerow = createRowFromHtml(client.id, client.name, client.surname, client.description);
						
						$('#clients tbody').append(tablerow);
						
					});	
					
					$.each(data.links, function(key, link){
						
						let button;
						
						button = "<button class='btn btn-primary' type='button' data-page='"+link.url+"' >"+link.label+"</button>";
						$('.button-container').append(button);
						
					});	
			}
			
		});
		
	</script>
</html>
