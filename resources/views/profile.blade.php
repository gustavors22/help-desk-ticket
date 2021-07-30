@extends('adminlte::page')
@section('title', 'Perfil')
@section('content')
@if($errors->any())
    <div class="alert alert-danger mt-2" role="alert">
          <strong>Não autorizado</strong>
    </div>
@endif
<div class="col-md-9 pt-4 m-auto">
  <form class="" action="{{route('profile.update', [$userData->id])}}" method="post">
    @csrf()
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputName4">Nome</label>
        <input type="text" class="form-control" id="inputName4" value="{{$userData->name}}" name="name">
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" value="{{$userData->email}}" name="email">
      </div>
    </div>

    <div class="form-col">
      <div class="">
        <button type="submit" class="btn btn-primary form-group" id="sup">Atualizar</button>
        <a href="{{route('home')}}">
          <input type="button" class="btn btn-warning form-group" value="Voltar">
        </a>
      </div>
    </div>
  </form>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop