@extends('layouts.index')

@section('name', 'Editar')

@section('content')
    @if(session('warning'))
        {{session('warning')}}
    @endif
    @if($errors->any())
        @foreach($errors->all() as $item)
            <p>{{$item}}</p><br/>
        @endforeach
    @endif
    <form method="POST">
        @csrf
        <input placeholder="titulo" name="titulo" type="text" value="{{$data->titulo}}"/>
        <input type="submit" value="Adicionar"/>
    </form>
   
@endsection