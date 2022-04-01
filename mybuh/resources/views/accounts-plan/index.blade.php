@extends('layouts.app')

@section('content')

<style>
.sort-list{
	cursor:pointer;
}

.sort-list:hover{
	color:blue;
}
</style>
<div class="container">
	<div class="row">
		<div class="col-12">
			<h2>Sąskaitų planas</h2>
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
		<div class="col-12 mb-2">
			<div class="pageLink float-end ceckbox-col" id="create_item" data-bs-toggle="modal" data-bs-target="#createAccountModal">Įvesti naują sąskaitą</div>
			<div class="row">
				<div class="col-6">
					<div class="row g-3 align-items-center searchAjaxForm">
						<div class="col-auto">
							<input id="searchValue" class="form-control" type="text"/>
						</div>
						<div class="col-auto">
							<span class="search-feedback"></span>
							<button class="btn btn-success table-buttons" type="button" id="submitSearch">Ieškoti</button>
						</div>
					</div>
				</div>
				<div class="col-6 ">
				
		            <form action="{{route('accountplan.importData')}}" method="post" enctype="multipart/form-data">
                       @csrf
                       <fieldset>
                           
                           <div class="input-group">
                               <input type="file" required class="form-control" name="uploaded_file" id="uploaded_file">
                               @if ($errors->has('uploaded_file'))
                                   <p class="text-right mb-0">
                                       <small class="danger text-muted" id="file-error">{{ $errors->first('uploaded_file') }}</small>
                                   </p>
                               @endif
                               <div class="input-group-append" id="button-addon2">
                                   <button class="btn btn-success square" type="submit"><i class="ft-upload mr-1"></i>Importuoti sąskaitų planą</button>
                               </div>
                           </div>
						   <label>Pasirinkite failą importavimui  <small class="warning text-muted">{{__('Prašome rinktis tik Excel (.xlsx or .xls) failus')}}</small></label>
                       </fieldset>
                   </form>		
					
				</div>	
			</div>	
			
		</div>
		
			<input id="hidden-sort" type="hidden" value="id"/> 
			<input id="hidden-direction" type="hidden" value="asc"/> 
			
		<div class="col-12">
			<div id="alert" class="alert alert-success d-none">
			</div>
			<table class="table table-success table-striped" id="list_table">
				<thead>
					<tr>
						<th style="width: 100px;">Veiksmai</th>
						<th style="width: 160px; ">
							<div class="sort-list"  data-sort="id" data-direction="asc">Sąskaitos numeris</div>
						</th>
						<th style="text-align: left;">
							<div class="sort-list"  data-sort="account_title" data-direction="asc">Sąskaitos pavadinimas</div>
						</th>
						<th style="width: 200px;">
							<div class="sort-list"  data-sort="itemType.account_title" data-direction="asc">Sąskaitos tipas</div>
						</th>
						<th class="ceckbox-col">
							<button type="button" class="btn btn-success table-buttons" id="selectAll" data-selected="false">Užžymėti visus</button>
						</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($accounts as $account)
					<tr class="item{{$account->id}}">
						<td>
							<div class="btn-container">
								<button data-item-id="{{$account->id}}" type="button" class="btn btn-success dbfl edit-item act-item" data-bs-toggle="modal" data-bs-target="#itemEditModal">..<span class="tooltipas">Redaguoti</span></button>
								
								<button data-item-id="{{$account->id}}" type="button" class="btn btn-dangeris dbfl delete-item act-item">-<span class="tooltipas">Ištrinti</span></button>
								
							</div>
						</td>
						<td class="col-item-col1">{{$account->account_number}}</td>
						<td class="col-item-col2" style="text-align: left;">{{$account->account_title}}</td>
						<td class="col-item-col3" style="text-align: left;"></td>
						<td>
							<input class="form-check-input col-item-checked" value="{{$account->id}}" name="delete_item[]" type="checkbox"/>
						</td>
					</tr>
				@endforeach 
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">
						</td>
						<td style="width: 40px;">
							<button type="button" class="btn btn-success table-buttons" id="deleteSelectedItems">Ištrinti pažymėtus</button>
						</td>
					</tr>			
				</tfoot>
			</table>
			
		<table class="template d-none">
			<tr >
				<td>
					<div class="btn-container">
						<button type="button" class="btn btn-success dbfl edit-item act-item" data-bs-toggle="modal" data-bs-target="#itemEditModal">..</button>
						<button type="button" class="btn btn-dangeris dbfl delete-item act-item" name="delete_item" >-</button>
					</div>
				</td>
				<td class="col-item-id"></td>
				<td class="col-item-col1" style="text-align: left;"></td>
				<td class="col-item-col2" style="text-align: left;"></td>
				<td class="col-item-col3" style="text-align: left;"></td>
				<td>
					<input class="form-check-input col-item-checked" name="delete_item[]" type="checkbox"/>
				</td>
			</tr>					
		</table>
			
				<div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">item data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
						  

							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="item_title" class="col-form-label">item title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="item_title" name="item_title" class="form-control">
								<span class="invalid-feedback input_item_title">item title field is required</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="item_type_id" class="col-form-label">item type</label>
							  </div>
							  <div class="col-7">
								<select class="form-select" aria-label=".form-select-sm example" name="item_type_id" id="item_type_id">
								{{--	@foreach ($itemTypes as $itemType)
									<option value="{{$itemType->id}}">{{$itemType->title}}</option>
								@endforeach--}}
								</select>
								<span class="invalid-feedback input_item_type_id">item title field is required</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="item_description" class="col-form-label">item description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="item_description" name="item_description" class="form-control">
								<span class="invalid-feedback input_item_description">item title field is required</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Uždaryti</button>
							<button class="btn btn-success" type="submit" name="save_item" id="save_item">Saugoti</button>
						  </div>
					</div>
				  </div>
				</div>
				


				<div class="modal fade" id="itemEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Edit item data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<input type="hidden" id="edit_item_id" name="item_id" />
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="item_title" class="col-form-label">item title</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="edit_item_title" name="item_title" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="item_type_id" class="col-form-label">item type</label>
							  </div>
							  <div class="col-7">
							  {{--	<select class="form-select" aria-label=".form-select-sm example" name="item_type_id" id="edit_item_type_id">
								@foreach ($itemTypes as $itemType)
									<option class="item{{$itemType->id}}" value="{{$itemType->id}}">{{$itemType->title}}</option>
								@endforeach
							  </select>--}}
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="item_description" class="col-form-label">item description</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="edit_item_description" name="item_description" class="form-control">
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-success edit_item" type="submit" name="edit_item" id="edit_item">Edit</button>
						  </div>
					</div>
				  </div>
				</div>


				<div class="modal fade" id="itemShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">item data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								item id: 
							  </div>
							  <div class="col-7 show-item-id">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								item title: 
							  </div>
							  <div class="col-7 show-item-title">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								item type: 
							  </div>
							  <div class="col-7 show-item-type-id">
							  </div>
							</div>
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								item description:
							  </div>
							  <div class="col-7 show-item-description">
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
				
				$(".col-item-checked").prop("checked", false);
				
				$('#selectAll').click(function(){
					let selectedValue = $(this).attr('data-selected');
					console.log(selectedValue);
					if(selectedValue == 'true'){
						$(".col-item-checked").each(function() {
							$(this).prop("checked", false);
						});
						$(this).attr('data-selected', 'false');
						$(this).html('Užžymėti visus');
					}else{
						$(".col-item-checked").each(function() {
							$(this).prop("checked", true);
						});
						$(this).attr('data-selected', 'true');
						$(this).html('Nužymėti visus');
					}
				});
				
				function createRowFromHtml(itemId, tableCol1, tableCol2, tableCol3){
					$(".template tr").removeAttr("class");
					$(".template tr").addClass('item'+itemId);
					$(".template .edit-item").attr('data-item-id', itemId);
					$(".template .delete-item").attr('data-item-id', itemId);
					$(".template .col-item-col1").html(tableCol1);
					$(".template .col-item-col2").html(tableCol2);
					$(".template .col-item-col3").html(tableCol3);
					$(".template .col-item-checked").val(itemId);
					return $(".template tbody").html();
				}
				
				$('#create_item').click(function(){
					
					$('.is-invalid').removeClass('is-invalid');
					
				});
				
				$('#save_item').click(function(){
					let item_title;
					let item_description;
					let item_type_id;
					
					item_title = $('#item_title').val();
					item_description = $('#item_description').val();
					item_type_id = $('#item_type_id').val();
					//console.log(item_title + " " + item_description + item_type_id);
					
					let sort;
					let direction;
					
					sort = $("#hidden-sort").val();
					direction = $("#hidden-direction").val();
					
				
					$.ajax({
						type: 'POST',
						url: '{{route("accountplan.storeAjax")}}',
						data: {item_title:item_title, item_description:item_description, item_type_id:item_type_id, sort:sort, direction: direction},
						success: function(data){
							
							if($.isEmptyObject(data.error_message)){
								let tablerow;
								$("#list_table tbody" ).html('');
								$.each(data.items, function(key, item){
									tablerow = createRowFromHtml(item.id, item.title, item.description, item.item_type.title);
									
									$('#list_table tbody').append(tablerow);
									
								});							

								$('#alert').removeClass("d-none");
								$('#alert').html(data.success_message);
								
								$('#itemModal').hide();
								$('body').removeClass('modal-open');
								$('.modal-backdrop').remove();
								$('body').css({overflow:'auto'});
								
								$('#item_title').val('');
								$('#item_description').val('');
								$('#item_type_id').val('');
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
				
				
				$(document).on('click', '.delete-item', function(){	
				
					let item_id;
					item_id = $(this).attr('data-item-id');
					
						$.ajax({
						type: 'POST',
						url: '/items/destroyAjax/' + item_id,
						success: function(data){
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							$('.item'+item_id).remove();
						}
						
					});
					
				});
				
				
				
				
				$(document).on('click', '.show-item', function(){	
				
					let item_id;
					item_id = $(this).attr('data-item-id');
					
						$.ajax({
						type: 'GET',
						url: '/items/showAjax/' + item_id,
						success: function(data){
							$('.show-item-id').html(data.item_id);
							$('.show-item-title').html(data.item_title);
							$('.show-item-description').html(data.item_description);
							$('.show-item-type-id').html(data.item_type);
						}
						
					});
					
				});
				
				
				$(document).on('click', '.edit-item', function(){	
				
					let item_id;
					item_id = $(this).attr('data-item-id');
					
						$.ajax({
						type: 'GET',
						url: '/items/showAjax/' + item_id,
						success: function(data){
							$('#edit_item_id').val(data.item_id);
							$('#edit_item_title').val(data.item_title);
							$('#edit_item_description').val(data.item_description);
							$('#edit_item_type_id option').removeAttr('selected');
							$('#edit_item_type_id').val(data.item_type_id);
							$('#edit_item_type_id .item'+data.item_type_id).attr("selected", "selected");
						}
						
					});
					
				});
				
		
				//$(document).on('click', '#edit_item', function(){
				$('#edit_item').click(function(){
					
					let item_id;
					let item_title;
					let item_description;
					let item_type_id;
					
					item_id = $('#edit_item_id').val();
					item_title = $('#edit_item_title').val();
					item_description = $('#edit_item_description').val();
					item_type_id = $('#edit_item_type_id').val();
					
						$.ajax({
						type: 'POST',
						url: '/items/updateAjax/' + item_id,
						data: {item_title:item_title, item_description:item_description, item_type_id:item_type_id},
						success: function(data){
							
							$('.item' + item_id + " " + ".col-item-title").html(data.item_title);
							$('.item' + item_id + " " + ".col-item-description").html(data.item_description);
							$('.item' + item_id + " " + ".col-item-type-id").html(data.item_type);
							
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							
							$('#itemEditModal').hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('body').css({overflow:'auto'});			
							
							
						}
						
					});
					
				});					
					
					
				$('.sort-list').click(function(){
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
						url: '{{route("accountplan.indexAjax")}}',
						data: {sort:sort, direction: direction},
						success: function(data){
							let tablerow;
							$("#list_table tbody" ).html('');
							$.each(data.items, function(key, item){
								//console.log(item.item_type.title);
								tablerow = createRowFromHtml(item.id, item.title, item.description, item.item_type.title);
								
								$('#list_table tbody').append(tablerow);
								
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
							url: '{{route("accountplan.searchAjax")}}',
							data: {searchValue: searchValue},
							success: function(data){
								
								if($.isEmptyObject(data.error_message)){
									let tablerow;
									$("#list_table" ).show();
									$('#alert').addClass('d-none');
									$("#list_table tbody" ).html('');
									$.each(data.items, function(key, item){
										tablerow = createRowFromHtml(item.id, item.title, item.description, item.type_id);
										
										$('#list_table tbody').append(tablerow);
										
									});		
								}else{
									$("#list_table" ).hide();
									$('#alert').removeClass('alert-success');
									$('#alert').addClass('alert-danger');
									$('#alert').removeClass('d-none');
									$('#alert').html(data.error_message);
								}
							}
							
						});
					
					}
				});
				

				
				$('#deleteSelectedItems').click(function(){
					let deletionList = [];
					
					 $("input:checked").each(function() {
							deletionList.push($(this).val());
						});
					
					//console.log(deletionList);
					
					
					$.ajax({
						type: 'POST',
						url: '{{route("accountplan.destroyAjaxMany")}}',
						data: {deletionList:deletionList},
						success: function(data){
							let tablerow;
							$("#list_table tbody" ).html('');
							$.each(data.items, function(key, item){
								tablerow = createRowFromHtml(item.id, item.title, item.description, item.item_type.title);
								
								$('#list_table tbody').append(tablerow);
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