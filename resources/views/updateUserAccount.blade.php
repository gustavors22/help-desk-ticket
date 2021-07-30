@extends('adminlte::page')
@section('title', 'Atualizar nivel de acesso')
@section('content')
@if($errors->any())
<div class="alert alert-danger mt-2" role="alert">
  <strong>Não autorizado</strong>
</div>
@endif
<div class="col-md-9 pt-4 m-auto">
  <table class="table table-striped table-bordered bg-white">
    <thead class="thead-white">
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Tipo da Conta</th>
        <th scope="col">opções</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->type}}</td>
        <td>
          <form action="{{route('admin.useraccount', [$user->id])}}" method="get" class="btn btn-primary btn-sm">
            <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop