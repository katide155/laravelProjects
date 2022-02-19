@extends('layouts.app')

@section('content')

<div class="container">

		<button class="btn btn-success" id="add_field">Add</button>
		<button class="btn btn-danger" id="remove_field">Remove</button>
		
		<input type="number" id="input_count"/>
		<button class="btn btn-primary" id="submit_number">ok</button>
		<form method="post" action="{{route('rating.store')}}">
		@csrf
		
			<div class="" id="liux">
				<input type="text" name="rating_title[]" value="test" />
				<input type="number" name="rating_rating[]" value="1" />
			</div>
			<div class="info"></div>
			<button class="btn btn-success" type="submit">Save</button>
		</form>

</div>
<script>

	$(document).ready(
	
		function(){
			
			$('#add_field').click(
				function(){
					
					$('.info').append('<div class="vidus">'+$('#liux').html()+'</div>');
				
				}
			);		
			
			$('#remove_field').click(
				function(){
					
					$('.vidus:last-child').remove();
				
				}
			);	

			$('#submit_number').click(
				function(){
					
					let input_count;
					input_count = $('#input_count').val();
					
					for(let i=0; i<input_count; i++){
						$('.info').append('<div class="vidus">'+$('#liux').html()+'</div>');
					}
					
				
				}			
			
			)
			console.log('veikia');
			
		}
	
	);
	
	
	
</script>

@endsection