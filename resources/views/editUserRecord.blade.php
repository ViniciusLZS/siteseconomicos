@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('...') }}">
@endsection

@section('title', 'Usuário Selecionado')
@php
    $page = 'Usuário Selecionado';
@endphp

@section('content')
  <div class="page-inner">
      <div class="page-header">
        <h4 class="page-title">Usuário</h4>
        <ul class="breadcrumbs">
          <li class="nav-home">
            <a href="#">
              <i class="flaticon-home"></i>
            </a>
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
              <a href="{{ route('listUsers') }}">Lista de Usuários</a>
            </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
            <li class="nav-item">
              <a href="#">Editar Usuário</a>
            </li>
        </ul>
      </div>
      <div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Editar Informações do Usuário: {{$users->name}}</div>
								</div>
                <form action="{{ route('editUserRecord.update') }}" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$users->id}}"/>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">

                        <div class="form-group">
                          <label for="name">Nome Completo</label>
                          <input type="text" value="{{$users->name}}" name="name" class="form-control" id="name" placeholder="full name">
                        </div>

                        <div class="form-group">
                          <label for="Funcao">Função</label>
                          <input type="text" value="{{$users->occupation}}" name="occupation" class="form-control" id="Funcao" placeholder="Occupation">
                        </div>

                        <div class="form-group">
                          <label for="email2">Email</label>
                          <input type="email" value="{{$users->email}}" name="email" class="form-control" id="email2" placeholder="example@example.com">
                        </div>

                        <div class="form-group">
                          <label for="cpf">CPF</label>
                          <input type="text" value="{{$users->cpf}}" name="cpf" class="form-control" id="cpf" placeholder="CPF">
                        </div>

                        <div class="form-group">
                          <label for="password">Senha</label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password"> 
                        </div>

                        <div class="form-group">
                          <label for="password">Confirmar Senha</label>
                          <input type="password" class="form-control" id="password" name="Confirm_Password" placeholder="Confirm Password">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button type="submit" class="btn btn-success">Concluir</button>
                    <button class="btn btn-danger">Cancelar</button>
                  </div>
                </form>
							</div>
						</div>
					</div>
  </div>
@endsection

@section('script')
@endsection