@extends('layouts.index')

@section('name', 'Adicionar')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $item)
            <p>{{$item}}</p><br/>
        @endforeach
    @endif
        @if(session('warning'))
            {{session('warning')}}
        @endif
    
    <form method="POST">
        @csrf
        <input placeholder="titulo" name="titulo" type="text"/>
        <input type="submit" value="Adicionar"/>
    </form>
   
@endsection