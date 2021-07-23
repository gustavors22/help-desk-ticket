@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tickets de Suport</h1>
@stop

@section('content')
<div class="col-11 table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered bg-white" style="box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.4);">
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
                <td>{{$ticket->name}}</td>
                <td>{{$ticket->email}}</td>
                <td>{{$ticket->title}}</td>
                <td>{{$ticket->created_at}}</td>
                <td>{{$ticket->solution_date}}</td>
                <td>{{$ticket->priority}}</td>
                <td>{{$ticket->status}}</td>
                <td>
                    <form action="{{route('support.show', [$ticket->id])}}" method="get" class="btn btn-primary btn-sm">
                        <button class="btn btn-primary"><i class="fa fa-eye"></i></button>
                    </form>
                    <form action="" method="post" class="btn btn-danger btn-sm" id="delete">
                        @csrf()
                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
        if('{{auth()->user()->type}}' != 'support'){
            const deleteBtn = document.querySelectorAll('#delete')[0]
            deleteBtn.hidden = true;
        }
    </script>
@stop