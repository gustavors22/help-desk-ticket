@extends('adminlte::page')
@section('title', 'Ticket')
@section('content')
@if($errors->any())
<div class="alert alert-danger mt-2" role="alert">
  <strong>Não autorizado</strong>
</div>
@endif


<div class="col-md-9 pt-4 m-auto">
  <form class="form-wrapper-scroll-y my-custom-scrollbar" action="{{route('support.update', [$ticket[0]->id])}}" method="post" enctype="multipart/form-data">
    @csrf()
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputName4">Nome</label>
        <input type="name" class="form-control" id="inputName4" value="{{$ticket[0]->getOwner($ticket[0]->user_id)->name}}" disabled>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4">Email</label>
        <input type="email" class="form-control" id="inputEmail4" value="{{$ticket[0]->getOwner($ticket[0]->user_id)->email}}" disabled>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputMessage">Message</label>
        <textarea type="textArea" class="form-control" id="inputMessage" cols="4" rows="4" disabled>{{$ticket[0]->user_message}}</textarea>
      </div>
      <div class="form-group col-md-4">
        <label for="inputMessage">Solução</label>
        <textarea type="textArea" class="form-control" id="sup" cols="4" rows="4" name="solution">{{!$solution ? "não definido" : $solution->solution}}</textarea>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputStatus">Status</label>
        <select name="status" class="form-control" id="sup">
          <option selected>{{$ticket[0]->status}}</option>
          <option>analise</option>
          <option>resolvendo</option>
          <option>resolvido</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="exampleFormControlTextarea1">Prioridade</label>
        <select name="priority" class="form-control" id="sup">
          <option selected>{{$ticket[0]->priority}}</option>
          <option>Alta</option>
          <option>Media</option>
          <option>Baixa</option>
        </select>
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="CreatedAt">Data de Criação</label>
        <input type="datetime" class="form-control" id="CreatedAt" value="{{$ticket[0]->created_at}}" disabled>
      </div>
      <div class="form-group col-md-4">
        <label for="SolutionDate">Data de Solução</label>
        <input type="datetime-local" class="form-control" id="solution_date" name="solution_date" value="">
      </div>
    </div>

    <div class="form-row" id="support-data">
      <div class="form-group col-md-4">
        <label for="inputName4">Nome do Suporte</label>
        <input type="name" class="form-control" id="inputName4" value="{{$solution != null ? $solution->getOwnerSolution($solution->support_id)->name : ''}}" disabled>
      </div>
      <div class="form-group col-md-4">
        <label for="inputEmail4">Email do Suporte</label>
        <input type="email" class="form-control" id="inputEmail4" value="{{$solution != null ? $solution->getOwnerSolution($solution->support_id)->email: ''}}" disabled>
      </div>
    </div>

    <div class="form-row">
      <img class="img-fluid " src="{{url('storage' ,$ticket[0]['image'][0]->path)}}">
    </div>

    <div class="form-col">
      <div class="form-group">
        <button type="submit" class="btn btn-primary" id="sup">Enviar</button>
        <a href="{{route('home')}}">
          <input type="button" class="btn btn-warning" value="Voltar">
        </a>
      </div>
    </div>
  </form>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
  .my-custom-scrollbar {
    position: relative;
    height: 690px;

    overflow: auto;
  }

  .form-wrapper-scroll-y {
    display: block;
  }
</style>
@stop

@section('js')
<script>
  if ('{{auth()->user()->type}}' == 'user') {
    const date = document.querySelectorAll('#solution_date');
    const inputs = [...document.querySelectorAll('#sup')];
    inputs.map(input => input.disabled = true);
    date.disabled = true;
  }

  if ('{{$ticket[0]->status}}' != 'resolvido') {
    const supportData = document.querySelectorAll('#support-data')[0]
    supportData.hidden = true
  }

  if ('{{$ticket[0]->solution_date}}' != '') {
    const date = new Date("{{$ticket[0]->changeDatetoUTC($ticket[0]->solution_date)}}");
    document.querySelectorAll("#solution_date")[0].value = date.toISOString().replace('000Z', "000");
    console.log(date.toISOString().replace('000Z', "000"))
  }
</script>
@stop