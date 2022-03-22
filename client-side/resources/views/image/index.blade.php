<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Client side</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
 <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 

        <!-- Styles -->


    </head>
    <body class="antialiased">
	

        
        <div class="container">
		
			<div class="imagesapi">
			</div>
		
            <table class="table table-stripped" id="images">
				<thead>
					<tr>
						<th>ID</th>
						<th>Title</th>
						<th>Image</th>
						<th>Description</th>
						<th style="width: 150px;">
							<button type="button" class="btn btn-success" id="create-image" data-bs-toggle="modal" data-bs-target="#createImageModal">Create image</button>
						</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		
			

			<div class="button-container">
			</div>
			
		<table class="template d-none">
			<tr >
				<td class="col-image-id"></td>
				<td class="col-image-title"></td>
				<td class="col-image-url"></td>
				<td class="col-image-description"></td>

				<td>
					<button type="button" class="btn btn-success edit-image" data-bs-toggle="modal" data-bs-target="#editImageModal">ed</button>
					<button type="button" class="btn btn-danger delete-image" name="delete_image" >dl</button>
					<button type="button" class="btn btn-primary show-image" data-bs-toggle="modal" data-bs-target="#showImageModal">sh</button>
				</td>
			</tr>					
		</table>
        </div>
		
		<div class="modal fade" id="createImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Create new image</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_title" class="col-form-label">Image title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="image_title" name="image_title" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_url" class="col-form-label">Image url</label>
							  </div>
							  <div class="col-7">
							  
							  	<select class="form-select select-image" aria-label=".form-select-sm example" name="image_url" id="image_url">
								</select>
								{{--<input type="text" id="image_url" name="image_url" class="form-control">--}}
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_alt" class="col-form-label">Image alt</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="image_alt" name="image_alt" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_description" class="col-form-label">Image description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="image_description" name="image_description" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-success save_image" type="submit" id="save_image">Save</button>
						  </div>
					</div>
				  </div>
				</div>
				
				
				<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit image data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<input type="hidden" id="edit_image_id" name="image_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_title" class="col-form-label">image_title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="edit_image_title" name="image_title" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image" class="col-form-label">Image</label>
							  </div>
							  <div class="col-7" id="show_image">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_url" class="col-form-label">Image url</label>
							  </div>
							  <div class="col-7">
							  	<select class="form-select select-image" aria-label=".form-select-sm example" name="image_url" id="edit_image_url">
								</select>
								{{--<input type="text" id="edit_image_url" name="image_url" class="form-control">--}}
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_alt" class="col-form-label">Image alt</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="edit_image_alt" name="image_alt" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="image_description" class="col-form-label">Image description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="edit_image_description" name="image_description" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-success" type="submit" id="edit_image">Edit</button>
						  </div>
					</div>
				  </div>
				</div>
				
				
				<div class="modal fade" id="showImageModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Image data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Image id: 
							  </div>
							  <div class="col-7 show_image_id">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Image title: 
							  </div>
							  <div class="col-7 show_image_title">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Image: 
							  </div>
							  <div class="col-7 show_image">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								Image description:
							  </div>
							  <div class="col-7 show_image_description">
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
	
		function createRowFromHtml(imageId, imageTitle, imageUrl, imageAlt, imageDescription){
			$(".template tr").removeAttr("class");
			$(".template tr").addClass('image'+imageId);
			$(".template .delete-image").attr('data-image-id', imageId);
			$(".template .show-image").attr('data-image-id', imageId);
			$(".template .edit-image").attr('data-image-id', imageId);
			$(".template .col-image-id").html(imageId);
			$(".template .col-image-title").html(imageTitle);
			$(".template .col-image-url").html('<img width="100px" src="'+imageUrl+'" alt="'+imageAlt+'" />');
			$(".template .col-image-description").html(imageDescription);
			return $(".template tbody").html();
		}
		
		$(document).ready(function(){
			
			console.log('veikia');
			
		})
		
		let accessKey = '6S3w4n58gZLsmftJvSuOy9WgUmbIFqlcZSlm8Qtf4To';
		for(i=0; i<5; i++){
			$.ajax({
				type: 'GET',
				url: 'https://api.unsplash.com/photos/?page='+i+'&client_id='+accessKey,
				success: function(data){
					console.log(data);
					
					$.each(data, function(key, image){
						let imagetag = '<img width="70px" src="'+image.urls.regular+'" alt="test" />';
						
						$('.imagesapi').append(imagetag);
						
						let imageopt = '<option value="'+image.urls.regular+'">'+image.urls.regular+'</option>';
						$('.select-image').append(imageopt);
					});
				}
			});
		}
		let csrf = '123456789';
		
	
		$(document).on('click', '.button-container button', function(){	
		
			let page = $(this).attr('data-page');
			
			$.ajax({
				type: 'GET',
				url: page,
				data: {csrf:csrf},
				success: function(data){
					
					$("#images tbody" ).html('');
					$(".button-container" ).html('');
					
					$.each(data.data, function(key, image){
						tablerow = createRowFromHtml(image.id, image.title, image.url, image.alt, image.description);
						
						$('#images tbody').append(tablerow);
						
					
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
			url: 'http://127.0.0.1:8000/api/images',
			data: {csrf:csrf},
			success: function(data){
				console.log(data);
				
					$("#images tbody" ).html('');
					
					$.each(data.data, function(key, image){
						tablerow = createRowFromHtml(image.id, image.title, image.url, image.alt, image.description);
						
						$('#images tbody').append(tablerow);
						
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
		
		
		$(document).on('click', '#save_image', function(){	
		
			let image_title = $('#image_title').val();
			let image_url = $('#image_url').val();
			let image_alt = $('#image_alt').val();
			let image_description = $('#image_description').val();
		
			$.ajax({
				type: 'POST',
				url: 'http://127.0.0.1:8000/api/images',
				data: {image_title:image_title,image_url:image_url,image_alt:image_alt, image_description:image_description},
				success: function(data){
					
					$('#createImageModal').hide();
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('body').css({overflow:'auto'});
					console.log(data);
						
				}
				
			});
			
			$.ajax({
				type: 'GET',
				url: 'http://127.0.0.1:8000/api/images',
				data: {csrf:csrf},
				success: function(data){
					console.log(data);
									
						$(".button-container" ).html('');
						$("#images tbody" ).html('');
						
						$.each(data.data, function(key, image){
							tablerow = createRowFromHtml(image.id, image.title, image.url, image.alt, image.description);
							
							$('#images tbody').append(tablerow);
							
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
		
		$(document).on('click', '#edit_image', function(){	
		
			let image_title = $('#edit_image_title').val();
			let image_url = $('#edit_image_url').val();
			let image_alt = $('#edit_image_alt').val();
			let image_description = $('#edit_image_description').val();
			let imageId = $('#edit_image_id').val();

			$.ajax({
				type: 'PUT',
				url: 'http://127.0.0.1:8000/api/images/'+imageId,
				data: {csrf:csrf, image_title:image_title,image_url:image_url,image_alt:image_alt, image_description:image_description},
				success: function(data){

					$('#editImageModal').hide();
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
					$('body').css({overflow:'auto'});
					// console.log(data);
						
				}
				
			});
		
		});

		$(document).on('click', '.edit-image', function(){	

			let	imageId = $(this).attr('data-image-id');
		
			$.ajax({
				type: 'GET',
				url: 'http://127.0.0.1:8000/api/images/'+imageId,
				success: function(data){
					
					$('#edit_image_id').val(data.id);
					$('#edit_image_title').val(data.title);
					$('#show_image').html('<img width="200px" src="'+data.url+'" alt="'+data.alt+'" />');
					$('#edit_image_url').val(data.url);
					$('#edit_image_alt').val(data.alt);
					$('#edit_image_description').val(data.description);
				
				}
			});
		});
		
		$(document).on('click', '.show-image', function(){	

			let	imageId = $(this).attr('data-image-id');
		
			$.ajax({
				type: 'GET',
				url: 'http://127.0.0.1:8000/api/images/'+imageId,
				success: function(data){
					
							$('.show_image_id').html(data.id);
							$('.show_image_title').html(data.title);
							$('.show_image').html('<img width="200px" src="'+data.url+'" alt="'+data.alt+'" />');
							$('.show_image_description').html(data.description);
					console.log(data);
						
				}
				
			});
		
		});
		
		$(document).on('click', '.delete-image', function(){	
		

			let	imageId = $(this).attr('data-image-id');
		
			$.ajax({
				type: 'DELETE',
				url: 'http://127.0.0.1:8000/api/images/'+imageId,
				success: function(data){
					console.log(data);
						
				}
				
			});
		
		});
		
	</script>
</html>
