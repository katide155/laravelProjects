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
		

				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					<form method="POST" action="{{route('client.update', $id)}}">
						@csrf
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update client</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<input type="hidden" id="edit_article_id" name="article_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_name" class="col-form-label">client_name</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="client_name" value='{{$client->name}}' name="client_name" class="form-control">
							  </div>
							</div>
							<input type="hidden" id="edit_article_id" name="article_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_surname" class="col-form-label">client_surname</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="client_surname" value='{{$client->surname}}' name="client_surname" class="form-control">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_description" class="col-form-label">client_description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="client_description" value='{{$client->description}}' name="client_description" class="form-control">
							  </div>
							</div>
							<input type="hidden" id="edit_article_id" name="article_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="client_company_title" class="col-form-label">client_company title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="client_company_title" value='{{$client->company_title}}' name="client_company_title" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-success save_client" type="submit" id="save_client">Add client to API DB</button>
						  </div>
						 </form>
					</div>
				</div>
			
			
		</div>
		
    </body>
	
	<script>
	</script>
</html>
