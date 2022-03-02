@extends('layouts.index')

@section('name', 'Login')

@section('content')

    @if(session('warning'))
        {{session('warning')}}
    @endif
    {{$tries}}
    <form method="POST">
        @csrf
        <input placeholder="email" name="email" type="text"/>
        <input placeholder="senha" name="password" type="password"/>
        <input type="submit" value="Adicionar"/>
    </form>
   
@endsection