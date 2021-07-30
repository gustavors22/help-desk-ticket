@extends('adminlte::page')
@section('title', 'Perfil')
@section('content')
@if($errors->any())
    <div class="alert alert-danger mt-2" role="alert">
          <strong>Não autorizado</strong>
    </div>
@endif
<div class="col-md-9 pt-4 m-auto">
  <form class="" action="{{route('profile.updatepass')}}" method="post">
    @csrf()
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputName4">Nova Senha</label>
        <input type="password" class="form-control" id="inputName4" name="new_password">
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4">Confirmar Nova Senha</label>
        <input type="password" class="form-control" id="inputEmail4" name="new_password_confirm">
      </div>
    </div>

    <div class="form-col">
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