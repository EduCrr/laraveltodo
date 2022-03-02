@extends('layouts.index')

@section('name', 'contato')

@section('content')
    {{$nome}} - {{$versao}}  - {{$idade}}
    @if($idade > 18)
        é adulto
    @endif
    <br/>
    @isset($versao)
            opa, temos uma versao {{$versao}}
    @endisset

    <h1>Lista bolo</h1>
    <ul>
        @if(count($lista) > 0 )
            
            @foreach ($lista as $index => $item)
            <li>{{$index}} - {{$item['nome']}}</li>
            @endforeach
        @else
            nao tem bolo
        @endif
    </ul>

    outro jeito
    @forelse ($lista as $item)
        <h1>{{$item['idade']}}</h1>    
    @empty
        <p>n tem</p>
    @endforelse
@endsection