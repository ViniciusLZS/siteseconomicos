@extends('layout.main')

@section('css')
    <link rel="stylesheet" href="{{ url('...') }}">
@endsection

@section('title', 'Usuário Selecionado')
@php
    $page = 'Usuário Selecionado';
@endphp

@section('content')
  <div class="page-inner container">
      <div class="page-header">
        <h4 class="page-title">Usuário</h4>
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
                          <input type="text" value="{{$users->name}}" name="name" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="full name">

                          @if ($errors->has('name'))
                            <span class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                            </span>
                          @endif
                        </div>

                        <div class="form-group">
                          <label for="Funcao">Função</label>
                          <input type="text" value="{{$users->occupation}}" name="occupation" class="form-control @error('occupation') is-invalid @enderror" id="Funcao" placeholder="Occupation">

                          @if ($errors->has('occupation'))
                            <span class="invalid-feedback">
                              <strong>{{ $errors->first('occupation') }}</strong>
                            </span>
                          @endif
                        </div>

                        <div class="form-group">
                          <label for="email2">Email</label>
                          <input type="email" value="{{$users->email}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email2" placeholder="example@example.com">

                          @if ($errors->has('email'))
                            <span class="invalid-feedback">
                              <strong>{{ $errors->first('email') }}</strong>
                            </span>
                          @endif
                        </div>

                        <div class="form-group">
                          <label for="cpf">CPF</label>
                          <input type="text" value="{{$users->cpf}}" name="cpf" class="cpf form-control @error('cpf') is-invalid @enderror" id="cpf" placeholder="000.000.000-00">
                          
                          @if ($errors->has('cpf'))
                            <span class="invalid-feedback">
                              <strong>{{ $errors->first('cpf') }}</strong>
                            </span>
                          @endif
                        </div>

                        <div class="form-group">
                          <label for="password">Senha</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"> 

                          @if ($errors->has('password'))
                            <span class="invalid-feedback">
                              <strong>{{ $errors->first('password') }}</strong>
                            </span>
                          @endif
                        </div>

                        <div class="form-group">
                          <label for="password_confirm">Confirmar Senha</label>
                          <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirm" name="password_confirmation" placeholder="Confirm Password">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-action">
                    <button type="submit" class="btn btn-success">Concluir</button>
                    <a  href="{{route('listUsers')}}" class="btn btn-danger">Cancelar</a>
                  </div>
                </form>
							</div>
						</div>
					</div>
  </div>
@endsection

@section('script')
  <!--Notification-->
  @include('script.notify')
 
  <!-- table filters -->
  <script src="../assets/js/maskCpf.js"></script>
@endsection