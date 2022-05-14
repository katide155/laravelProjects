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
						<div class="col-5">
							<input id="searchValue" class="form-control" type="text" placeholder="Įveskite ieškomą frazę..."/>
							<span class="search-feedback"></span>
						</div>
					
						<div class="col-3">
							<select name="pages_in_sheet" class="form-select" id="pages_in_sheet">
							{{-- @foreach ($paginationSettings as $pagin)
									@if($pagin->value == $pages_in_sheet)
									<option value="{{$pagin->value}}" selected>{{$pagin->title}}</option>
									@else
									<option value="{{$pagin->value}}">{{$pagin->title}}</option>	
									@endif
							@endforeach --}}
									<option value="20">20</option>	
									<option value="50">50</option>
									<option value="100">100</option>								
									<option value="1">Visi</option>	
							</select>
						</div>
						{{-- <div class="col-4">	
							<button class="btn btn-success table-buttons" type="button" id="pages-qtt">Pasirinkti</button>
						</div> --}}
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
							<div class="sort-list"  data-sort="account_number" data-direction="asc">@sortablelink('account_number', 'Sąskaitos numeris')</div>
						</th>
						<th style="text-align: left;">
							<div class="sort-list"  data-sort="account_title" data-direction="asc">@sortablelink('account_title', 'Sąskaitos pavadinimas')</div>
						</th>
						<th style="width: 200px;">
							<div class="sort-list"  data-sort="account_type" data-direction="asc">@sortablelink('account_type_id', 'Sąskaitos tipas')</div>
						</th>
						<th class="ceckbox-col">
							<button type="button" class="btn btn-success table-buttons" id="selectAll" data-selected="false">Užžymėti visus</button>
						</th>
					</tr>
				</thead>
				<tbody>
				@foreach ($accounts as $account)
					<tr class="item{{$account->id}}" ondblclick="showEditModal({{$account->id}})">
						<td>
							<div class="btn-container">
								<button data-item-id="{{$account->id}}" type="button" class="btn btn-success dbfl edit-item act-item" data-bs-toggle="modal" data-bs-target="#editAccountModal">..<span class="tooltipas">Redaguoti</span></button>
								<button data-item-id="{{$account->id}}" type="button" class="btn btn-dangeris dbfl delete-item act-item">x<span class="tooltipas">Ištrinti</span></button>
							</div>
						</td>
						<td class="col-item-col1" style="text-align: left;">
							@if(strlen($account->account_number)==1)
								<span class="level1">{{$account->account_number}}</span>
							@elseif(strlen($account->account_number)==2)
								<span class="level2">{{$account->account_number}}</span>
							@elseif(strlen($account->account_number)==3)
								<span class="level3">{{$account->account_number}}</span>
							@elseif(strlen($account->account_number)==4)
								<span class="level4">{{$account->account_number}}</span>
							@elseif(strlen($account->account_number)==5)
								<span class="level5">{{$account->account_number}}</span>
							@else
								<span class="level6">{{$account->account_number}}</span>
							@endif
						</td>
						<td class="col-item-col2" style="text-align: left;">
							@if(strlen($account->account_number)==1)
								<span class="level1">{{$account->account_title}}</span>
							@elseif(strlen($account->account_number)==2)
								<span class="level2">{{$account->account_title}}</span>
							@elseif(strlen($account->account_number)==3)
								<span class="level3">{{$account->account_title}}</span>
							@elseif(strlen($account->account_number)==4)
								<span class="level4">{{$account->account_title}}</span>
							@elseif(strlen($account->account_number)==5)
								<span class="level5">{{$account->account_title}}</span>
							@else
								<span class="level6">{{$account->account_title}}</span>
							@endif
						</td>
						<td class="col-item-col3" style="text-align: left;">
		
							@isset($account->planAccountType->account_type_title) 
								{{$account->planAccountType->account_type_title}}
							@endisset
							
						</td>
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
			
			<div class="button-container">
			</div>
			
		<table class="template d-none">
			<tr >
				<td>
					<div class="btn-container">
						<button type="button" class="btn btn-success dbfl edit-item act-item" data-bs-toggle="modal" data-bs-target="#editAccountModal">..<span class="tooltipas">Redaguoti</span></button>
						<button type="button" class="btn btn-dangeris dbfl delete-item act-item">x<span class="tooltipas">Ištrinti</span></button>
					</div>
				</td>
				<td class="col-item-col1" style="text-align: left;"><span></span></td>
				<td class="col-item-col2" style="text-align: left;"><span></span></td>
				<td class="col-item-col3" style="text-align: left;"><span></span></td>
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
								<label for="account_number" class="col-form-label">Sąskaitos numeris</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="account_number" name="account_number" class="form-control">
								<span class="invalid-feedback input_item_account_number">Laukas „Sąskaitos numeris“ yra privalomas</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="account_title" class="col-form-label">Sąskaitos pavadinimas</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="account_title" name="account_title" class="form-control">
								<span class="invalid-feedback input_item_account_title">Laukas „Sąskaitos pavadinimas“ yra privalomas</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="grouped_account" class="col-form-label">Grupinė sąskaita</label>
							  </div>
							  <div class="col-7">
									<input type="checkbox" name="grouped_account" id="grouped_account">
									<span>Pažymėti, jei sąskaita grupinė</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="account_type_id" class="col-form-label">Sąskaitos tipas</label>
							  </div>
							  <div class="col-7">
								<select class="form-select" aria-label=".form-select-sm example" name="account_type_id" id="account_type_id">
									<option value="" selected></option>
								@foreach ($acountsTypes as $acountsType)
									<option value="{{$acountsType->id}}">{{$acountsType->account_type_title}}</option>
								@endforeach
								</select>
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
				


				<div class="modal fade" id="editAccountModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">item data</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							<input type="hidden" id="plan_account_id" name="plan_account_id" />
							  <div class="col-5">
								<label for="account_number" class="col-form-label">Sąskaitos numeris</label>
							  </div>
							  <div class="col-7">
								<input type="text" id="edit_account_number" name="account_number" class="form-control">
								<span class="invalid-feedback input_item_account_number">Laukas „Sąskaitos numeris“ yra privalomas</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="account_title" class="col-form-label">Sąskaitos pavadinimas</label>
							  </div>
							  <div class="col-7">
								<input type="textarea" id="edit_account_title" name="account_title" class="form-control">
								<span class="invalid-feedback input_item_account_title">Laukas „Sąskaitos pavadinimas“ yra privalomas</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="grouped_account" class="col-form-label">Grupinė sąskaita</label>
							  </div>
							  <div class="col-7">
									<input type="checkbox" name="grouped_account" id="edit_grouped_account">
									<span>Pažymėti, jei sąskaita grupinė</span>
							  </div>
							</div>
						  </div>
						  <div class="modal-body">
							<div class="row g-3 align-items-center">
							  <div class="col-5">
								<label for="account_type_id" class="col-form-label">Sąskaitos tipas</label>
							  </div>
							  <div class="col-7">
								<select class="form-select" aria-label=".form-select-sm example" name="account_type_id" id="edit_account_type_id">
									<option value="" selected></option>
								@foreach ($acountsTypes as $acountsType)
									<option value="{{$acountsType->id}}">{{$acountsType->account_type_title}}</option>
								@endforeach
								</select>
							  </div>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" id="closeModal" data-bs-dismiss="modal">Uždaryti</button>
							<button class="btn btn-success" type="submit" name="edit_item" id="edit_item">Saugoti</button>
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
					//console.log(selectedValue);
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
					let account_number_length;
					account_number_length = tableCol1.length;
					$(".template tr > td > span").removeAttr("class");
					$(".template tr > td > span").addClass('level'+account_number_length);
					$(".template .col-item-col1 span").html(tableCol1);
					$(".template .col-item-col2 span").html(tableCol2);
					$(".template .col-item-col3 span").html(tableCol3);
					$(".template .col-item-checked").val(itemId);
					return $(".template tbody").html();
				}
				
				$('#create_item').click(function(){
					$('.is-invalid').removeClass('is-invalid');
				});
				
				
				$('#save_item').click(function(){
					let account_number;
					let account_title;
					let account_type_id;
					let grouped_account = 0;
					
					account_number = $('#account_number').val();
					account_title = $('#account_title').val();
					account_type_id = $('#account_type_id').val();
					
					if($('#grouped_account').is(":checked"))
						grouped_account = 1;
					//console.log(account_number + " " + account_title + "st-" + account_type_id + "-ff-" + grouped_account);
					
					let sort;
					let direction;
					
					sort = $("#hidden-sort").val();
					direction = $("#hidden-direction").val();
					
				
					$.ajax({
						type: 'POST',
						url: '{{route("accountplan.store")}}',
						data: {account_number:account_number, account_title:account_title, account_type_id:account_type_id, grouped_account:grouped_account, sort:sort, direction: direction},
						success: function(data){
							//console.log(data);
							if($.isEmptyObject(data.error_message)){
								let tablerow;
								$("#list_table tbody" ).html('');
								//console.log(data.accounts.data);
								$.each(data.accounts.data, function(key, account){
									
									let account_type_title = "";
									if(!account.plan_account_type == null)
										account_type_title = account.plan_account_type.account_type_title;
									tablerow = createRowFromHtml(account.id, account.account_number, account.account_title, account_type_title);
									
									$('#list_table tbody').append(tablerow);
									
									$('#alert').removeClass("d-none");
									$('#alert').html(data.success_message);
								
													

									$('#alert').removeClass("d-none");
									$('#alert').html(data.success_message);
									
									$('#createAccountModal').hide();
									$('body').removeClass('modal-open');
									$('.modal-backdrop').remove();
									$('body').css({overflow:'auto'});
									
									$('#account_number').val('');
									$('#account_title').val('');
									$('#account_type_id').val('');
								});	
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
				
				
				//showEditModal

				
				
				
				$(document).on('click', '.edit-item', function(){	
				
					let item_id;
					item_id = $(this).attr('data-item-id');
					
					$.ajax({
						type: 'GET',
						url: '/accounts-plan/showItem/' + item_id,
						success: function(data){
							
							$('#plan_account_id').val(data.plan_account_id);
							$('#edit_account_number').val(data.account_number);
							$('#edit_account_title').val(data.account_title);
							
							let grouped_account = data.grouped_account;
							
							if(grouped_account)
								$('#edit_grouped_account').prop("checked", true);
							else
								$('#edit_grouped_account').prop("checked", false);
							
							$('#edit_grouped_account').val(data.grouped_account);
							$('#edit_account_type_id option').removeAttr('selected');
							$('#edit_account_type_id').val(data.account_type_id);
							$('#edit_account_type_id .item'+data.account_type_id).attr("selected", "selected");
							
						}
						
					});
					
				});
				
		
				//$(document).on('click', '#edit_item', function(){
				$('#edit_item').click(function(){
					
					let item_id;
					let account_number;
					let account_title;
					let account_type_id;
					
					item_id = $('#plan_account_id').val();
					account_number = $('#edit_account_number').val();
					account_title = $('#edit_account_title').val();
					grouped_account = 0;
					if($('#edit_grouped_account').is(":checked"))
						grouped_account = 1;
					account_type_id = $('#edit_account_type_id').val();
					
						$.ajax({
						type: 'POST',
						url: '/accounts-plan/updateItem/' + item_id,
						data: {account_number:account_number, account_title:account_title, grouped_account:grouped_account, account_type_id:account_type_id},
						success: function(data){
							
							$('.item' + item_id + " " + ".col-item-title").html(data.account_number);
							$('.item' + item_id + " " + ".col-item-description").html(data.account_title);
							$('.item' + item_id + " " + ".col-item-type-id").html(data.account_type_id);
							
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							
							$('#editAccountModal').hide();
							$('body').removeClass('modal-open');
							$('.modal-backdrop').remove();
							$('body').css({overflow:'auto'});			
							
							
						}
						
					});
					
				});					
					
					
				//$('.sort-list').click(function(){
				$(document).on('click', '.sort-list', function(){
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
					
					console.log("xxx");
					
						$.ajax({
						type: 'GET',
						url: '{{route("accountplan.indexAjax")}}',
						data: {sort:sort, direction: direction},
						success: function(data){
							
							
							let tablerow;
							$("#list_table tbody" ).html('');

							$.each(data.accounts.data, function(key, account){
								
															
								let account_type_title = "";
									if(!account.plan_account_type == null)
										account_type_title = account.plan_account_type.account_type_title;
									
								tablerow = createRowFromHtml(account.id, account.account_number, account.account_title, account_type_title);
								$('#list_table tbody').append(tablerow);
							});
							
							
							$(".button-container" ).html('');
							
							
							
							$.each(data.links, function(key, link){
						
								let button;
								if(link.url != null){
									
									
									
									let active_class = "";
									if(link.active == true)
									{
										let active_class = "active";
									}
									
									button = "<button class='btn btn-success "+active_class+"' type='button' data-page='"+link.url+"' >"+link.label+"</button>";
									
								}
								
								$('.button-container').append(button);
								
							});	
							
							//console.log(tablerow);
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
							url: '{{route("accountplan.searchAccount")}}',
							data: {searchValue: searchValue},
							success: function(data){
								
								if($.isEmptyObject(data.error_message)){
									let tablerow;
									$("#list_table" ).show();
									$('#alert').addClass('d-none');
									$("#list_table tbody" ).html('');
									$.each(data.accounts.data, function(key, account){
										let account_type_title = "";
										if(!account.plan_account_type == null)
											account_type_title = account.plan_account_type.account_type_title;
										
										tablerow = createRowFromHtml(account.id, account.account_number, account.account_title, account_type_title);
										
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
				
				$(document).on('click', '.delete-item', function(){	
				
					let item_id;
					item_id = $(this).attr('data-item-id');
					
						$.ajax({
						type: 'POST',
						url: '/accounts-plan/destroy/' + item_id,
						success: function(data){
							$('#alert').removeClass("d-none");
							$('#alert').html(data.success_message);
							$('.item'+item_id).remove();
							
							$(".button-container" ).html('');
							
							console.log(data);
							
							$.each(data.links, function(key, link){
						
								let button;
								if(link.url != null){
									
									let active_class = "";
									if(link.active == true)
									{
										let active_class = "active";
									}
									
									button = "<button class='btn btn-success "+active_class+"' type='button' data-page='"+link.url+"' >"+link.label+"</button>";
									
								}
								
								$('.button-container').append(button);
								
							});	
						}
						
					});
					
				});
				
				$('#deleteSelectedItems').click(function(){
					let deletionList = [];
					
					 $(".col-item-checked:checked").each(function() {
							deletionList.push($(this).val());
						});
					
					//console.log(deletionList);
					
					
					$.ajax({
						type: 'POST',
						url: '{{route("accountplan.destroyMany")}}',
						data: {deletionList:deletionList},
						success: function(data){
							let tablerow;
							$("#list_table tbody" ).html('');
							//console.log(data);
							$.each(data.accounts.data, function(key, account){
								
								let account_type_title = "";
								if(!account.plan_account_type == null)
									account_type_title = account.plan_account_type.account_type_title;

								
								tablerow = createRowFromHtml(account.id, account.account_number, account.account_title, account_type_title);
								$('#list_table tbody').append(tablerow);
								
								$('#alert').removeClass("d-none");
								$('#alert').html(data.success_message);
							
							});

						}
						
					});
				});
					
				//$('#pages-qtt').click(function(){
				$(document).on('change', '#pages_in_sheet', function(){	

					let pages_in_sheet = $("#pages_in_sheet" ).val();
					let sort;
					let direction;
					
					sort = $("#hidden-sort").val();
					direction = $("#hidden-direction").val();
					
					if(direction == 'asc'){
						$(this).attr('data-direction', 'desc');
					}else{
						$(this).attr('data-direction', 'asc');
					}
					
					var base_url = window.location.origin;
					
					console.log(base_url);
			
					$.ajax({
						type: 'POST',
						url: '{{route("accountplan.show")}}',
						data: {pages_in_sheet:pages_in_sheet, sort:sort, direction: direction},
						success: function(data){
							let tablerow;
							$("#list_table tbody" ).html('');
							console.log(data);
							$.each(data.accounts.data, function(key, account){
								
								let account_type_title = "";
								if(!account.plan_account_type == null)
									account_type_title = account.plan_account_type.account_type_title;

								
								tablerow = createRowFromHtml(account.id, account.account_number, account.account_title, account_type_title);
								$('#list_table tbody').append(tablerow);
								
							
							});
							
							
							$(".button-container" ).html('');
							
							console.log(data);
							
							$.each(data.accounts.links, function(key, link){
						
								let button;
								if(link.url != null){
									
									let active_class = "";
									if(link.active == true)
									{
										let active_class = "active";
									}
									
									button = "<a class='btn btn-success' "+active_class+"' href='"+base_url+"/accounts-plan?page="+link.label+"&sort="+data.sort+"&direction="+data.direction+"' >"+link.label+"</a>";
									
								}
								
								$('.button-container').append(button);
								
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