@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1 class="text-center">Criar Novo Usuário</h1>
@stop
@section('content')
@if($errors->any())
<div class="alert alert-danger mt-2" role="alert">
    <strong>Não autorizado</strong>
</div>
@endif
<div class="col-md-5 m-auto">
    <div class="register-form mb-5 pt-5" id="register-form">
        <form action="{{route('support.storeuser')}}" method="post">
            @csrf()
            <div class="form-group">
                <input type="text" class="form-control" placeholder="nome" name="name" required="required">
            </div>
    
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required="required">
            </div>
    
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Senha" name="password" required="required">
            </div>
    
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa fa-sign-in" aria-hidden="true"></i>
                    Registrar
                </button>
            </div>
    
        </form>
    </div>

</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop