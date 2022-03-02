@extends('layouts.index')

@section('name', 'Register')

@section('content')

    @if($errors->any())
        @foreach ($errors->all() as $item)
            <p>{{$item}}</p> <br/>
        @endforeach
    @endif
    <form method="POST">
        @csrf
        <input placeholder="email" name="email" type="text" value="{{old('email')}}"/>
        <input placeholder="name" name="name" type="text" value="{{old('name')}}"/>
        <input placeholder="senha" name="password" type="password"/>
        <input placeholder="confirme sua senha" name="password_confirmation" type="password"/>
        <input type="submit" value="Cadastrar"/>
    </form>
   
@endsection