@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('...') }}">
@endsection

@section('title', 'Lista de Usuários')
@php
    $page = 'Lista de Usuários';
@endphp


@section('content')
	<div class="page-inner ">
		<div class="page-header">

			<h4 class="page-title">Usuários</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
						<a href="{{route('welcome')}}"><i class="flaticon-home"></i></i></a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Usuários</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Lista de Usuários</a>
				</li>
			</ul>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">	
						<div class="d-flex align-items-center">
							<h4 class="card-title">Lista de Usuários</h4>
							<a href="{{route('createUsers')}}" class="btn btn-primary btn-round ml-auto">
								<i class="fa fa-plus"></i>
								Add Usuário
							</a>
						</div>
					</div>
					<div class="card-body">
						
						<!-- Modal -->
						<div id="modal" class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header no-bd">
										<h5 class="modal-title">
											<span class="fw-mediumbold">
											Deletar Usuário</span> 
										</h5>
										<button type="button" class="close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
									</div>


									<div  class="modal-body">
										<p class="small">Você deseja DELETAR este usuário?</p>
										<form action="{{ route('listUsers.destroy') }}" method="post">
											@csrf
											<div id="modal-content">
                    	</div>
											<div class="modal-footer no-bd">
												<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>
												
												<button class="btn btn-danger" type="submit" data-dismiss="modal">Deletar</button>
											</div>
										</form>
									</div>

								</div>
							</div>
						</div>

						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover" >
								<thead>
									<tr class="text-center">
										<th>Nome</th>
										<th>Função</th>
										<th>Email</th>
										<th>CPF</th>

										<th>Ativar / Desativar</th>
										<th style="width: 10%">Ações</th>
									</tr>
								</thead>
								<tfoot>
									<tr class="text-center">
										<th>Nome</th>
										<th>Função</th>
										<th>Email</th>
										<th>CPF</th>
										<th>Ativar / Desativar</th>
										<th>Ações</th>
									</tr>
								</tfoot>

									<tbody>
										@foreach ($users as $user)
											<tr class="text-center">
												<td>{{$user->name}}</td>
												<td>{{$user->occupation}}</td>
												<td>{{$user->email}}</td>
												<td class="cpf">{{$user->cpf}}</td>
												<td>
													<form action="{{ route('listUsers.update') }}" method="post">
														@csrf
														<input type="hidden" name="id" value="{{ $user->id }}"/>
														<div class=" form-switch d-flex justify-content-center">
															
															<input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" {{$user->status === 1 ? 'checked' : ''}} onChange="this.form.submit()" name="status" value="{{$user->status}}">
														</div>
													</form>
												</td>
												<td>
													<div class="form-button-action d-flex justify-content-center">
														<form class="mb-0" action="{{route('viewUser.show', $user->id)}}" method="GET">
															@csrf
															<button type="submit" data-toggle="tooltip"  title="Visializar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
															<i class="fa icon-eye"></i>
														</button>
														</form>

														<form class="mb-0" action="{{route('editUserRecord.show', $user->id)}}" method="GET">
															@csrf
															<button type="submit" data-toggle="tooltip"  title="Editar" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
															<i class="fa fa-edit"></i>
														</button>
														</form>

														<button onclick="delete_Modal({{ $user }})" class="btn btn-link btn-danger" data-toggle="modal" title="Deletar" data-target="#addRowModal">
															<i class="fa fa-times"></i>
														</button>
													</div>
												</td>
											</tr>	
										@endforeach
									</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection

@section('script')
	<!--Notification-->
	@include('script.notify')

	<!-- Modal delete -->
	<script src="../assets/js/listUser.js"></script>

	<!-- Mask CPF -->
	<script src="../assets/js/maskCpf.js"></script>

	<!-- table filters -->
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
@endsection

