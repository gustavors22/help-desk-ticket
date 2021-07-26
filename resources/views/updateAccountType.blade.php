@extends('adminlte::page')
@section('title', 'Atualizar nivel de acesso')
@section('content')
@if($errors->any())
    <div class="alert alert-danger mt-2" role="alert">
          <strong>Não autorizado</strong>
    </div>
@endif
<div class="col-md-9 pt-4 m-auto">
  <form class="" action="{{route('admin.useraccountup')}}" method="post">
    @csrf()
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Email do Usuário</label>
        <input type="text" class="form-control" id="inputEmail4" value="" name="email">
      </div>
      <div class="form-group col-md-4">
      <label for="exampleFormControlTextarea1">Prioridade</label>
        <select name="type" class="form-control" id="sup">
          <option selected>user</option>
          <option>admin</option>
          <option>support</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <button type="submit" class="btn btn-primary form-group" id="sup">Atualizar</button>
      <a href="{{route('home')}}">
        <input type="button" class="btn btn-warning form-group" value="Voltar">
      </a>
    </div>
  </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop