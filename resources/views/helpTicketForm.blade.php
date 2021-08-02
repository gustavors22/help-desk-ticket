@extends('adminlte::page')
@section('title', 'Criar Ticket')
@section('content')
<div class="col-md-6 m-auto mt-5">
    <form class="form-wrapper-scroll-y my-custom-scrollbar" action="{{ route('help.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group m-2">
            <label for="exampleFormControlInput1">Nome</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="your name" value="{{auth()->user()->name}}" required>
        </div>

        <div class="form-group  m-2">
            <label for="exampleFormControlInput1">Endereço Email</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com" value="{{auth()->user()->email}}" required>
        </div>

        <div class="form-group  m-2">
            <label for="exampleFormControlTextarea1">Titulo</label>
            <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="title" rows="1" required></textarea>
        </div>

        <div class="form-group  m-2">
            <label for="exampleFormControlTextarea1">Mensagem</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="user_message" type="text" required></textarea>
        </div>

        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="formFile" class="form-label">Inserir imagem</label>
                <input type="file" class="form-control" name="image" id="image-input">
            </div>
        </div>


        <div class="form-group  m-2">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-paper-plane"></i>
                Enviar
            </button>

            <a href="{{ route('home') }}">
                <input type="button" class="btn btn-warning" value="Voltar">
            </a>
        </div>
    </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
  .my-custom-scrollbar {
    position: relative;
    height: 700px;
    overflow: auto;
  }

  .form-wrapper-scroll-y {
    display: block;
  }
</style>
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop