@extends('layouts.index')

@section('name', 'Listagem')

@section('content')

<h1>Listagem de tarefas</h1>    
    @if(session('warning'))
        {{session('warning')}}
    @endif
    <a href="{{url('/tarefas/add')}}">Add tarefa</a>

    @if($showName)
      <h1>User: {{$user->name}}</h1>
    @endif

    @if (count($list) > 0)
        @foreach ($list as $item)
            <h4>
                {{$item->titulo}}
                
                <a href="{{url('/tarefas/marcar', ['id' => $item->id])}}">@if($item->resolvido === 1) Feito @else Fazer @endif</a>
                <br/>
                <a href="{{url('/tarefas/edit', ['id' => $item->id])}}">Editar</a>
                <a href="{{url('/tarefas/delete', ['id' => $item->id])}}" onclick="return confirm('deseja excluir')">Excluir</a>
            </h4>
            <hr/>
        @endforeach
    @else
        Não tem lista.
    @endif
    
@endsection