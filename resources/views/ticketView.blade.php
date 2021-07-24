@extends('adminlte::page')
@section('title', 'Ticket')
@section('content')
<form class="mt-2" action="{{route('support.update', [$ticket->id])}}" method="post">
  @csrf()
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputName4">Nome</label>
      <input type="email" class="form-control" id="inputName4" value="{{$ticket->name}}" disabled>
    </div>
    <div class="form-group col-md-3">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" value="{{$ticket->email}}" disabled>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="inputMessage">Message</label>
    <textarea type="textArea" class="form-control" id="inputMessage" rows="10" disabled>{{$ticket->user_message}}</textarea>
  </div>
  <div class="form-group col-md-6">
    <label for="inputMessage">Solução</label>
    <textarea type="textArea" class="form-control" id="sup" cols="10" rows="10" name="solution">{{!$ticket->solution ? "não definido" : $ticket->solution}}</textarea>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="inputStatus">Status</label>
      <select name="status" class="form-control" id="sup">
        <option selected>{{$ticket->status}}</option>
        <option>analise</option>
        <option>resolvendo</option>
        <option>resolvido</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Prioridade</label>
      <select name="priority" class="form-control" id="sup">
        <option selected>{{$ticket->priority}}</option>
        <option>Alta</option>
        <option>Media</option>
        <option>Baixa</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <label for="CreatedAt">Data de Criação</label>
      <input type="datetime" class="form-control" id="CreatedAt" value="{{$ticket->created_at}}" disabled>
    </div>
    <div class="form-group col-md-3">
      <label for="SolutionDate">Data de Solução</label>
      <input type="datetime-local" class="form-control" id="solution_date" name="solution_date" value="">
    </div>
  </div>
  <button type="submit" class="btn btn-primary" id="sup">Enviar</button>
  <a href="{{route('home')}}">
    <input type="button" class="btn btn-warning" value="Voltar">
  </a>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  if ('{{auth()->user()->type}}' != 'support') {
    const date = document.querySelectorAll('#solution_date');
    const inputs = [...document.querySelectorAll('#sup')];
    inputs.map(input => input.disabled = true);
    date.disabled = true;
  }

  if ('{{$ticket->solution_date}}' != '') {
    const date = new Date("{{$ticket->changeDatetoUTC($ticket->solution_date)}}");
    document.querySelectorAll("#solution_date")[0].value = date.toISOString().replace('000Z', "000");
    console.log(date.toISOString().replace('000Z', "000"))
  }
</script>
@stop