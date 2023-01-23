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
            <a href="#">Usuários Selecionado</a>
          </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <div class="card-title">{{$users->name}}</div>
          </div>
          <div class="card-body">
            <div class="card-sub"></div>
            <div class="table-responsive">
              <table class="table table-bordered mt-3">
                <thead>
                  <tr class="text-center">
                    <th scope="col">Nome</th>
                    <th scope="col">Função</th>
                    <th scope="col">Email</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="text-center">
                    <td>{{$users->name}}</td>
                    <td>{{$users->occupation}}</td>
                    <td>{{$users->email}}</td>
                    <td class="cpf">{{$users->cpf}}</td>
                    <td>{{$users->status === 1 ? "Ativo": "Desativado"}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="../assets/js/viewUser.js"></script>
@endsection