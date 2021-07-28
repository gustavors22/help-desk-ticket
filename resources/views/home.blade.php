@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center">Tickets de Suport</h1>
@stop

@section('content')
@if($errors->any())
    <div class="alert alert-danger mt-2" role="alert">
          <strong>Não autorizado</strong>
    </div>
@endif
<div class="col-13 table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered bg-white">
        <thead class="thead-white">
            <tr>
                <th scope="col">Código</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Titulo</th>
                <th scope="col">Data de Criação</th>
                <th scope="col">Data de Resolução</th>
                <th scope="col">Prioridade</th>
                <th scope="col">Status</th>
                <th scope="col">opções</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
            <tr>
                <th scope="row">{{$ticket->id}}</th>
                <td>{{$ticket->getOwner($ticket->user_id)->name}}</td>
                <td>{{$ticket->getOwner($ticket->user_id)->email}}</td>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->created_at}}</td>
                <td>{{$ticket->solution_date}}</td>
                <td>{{$ticket->priority}}</td>
                <td>{{$ticket->status}}</td>
                <td>
                    <form action="{{route('support.show', [$ticket->id])}}" method="get" class="btn btn-primary btn-sm">
                        <button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button>
                    </form>
                    <form action="{{route('support.closeticket', [$ticket->id])}}" method="post" class="btn btn-success btn-sm" id="close-ticket">
                        @csrf()
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i></button>
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
    <style>
        .my-custom-scrollbar {
            position: relative;
            height: 500px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
    </style>
@stop

@section('js')
    <script>
        if('{{auth()->user()->type}}' == 'user'){
            const closeTicketBtn = [...document.querySelectorAll('#close-ticket')];
            closeTicketBtn.map(button => button.hidden = true);
        }

        
    </script>
@stop