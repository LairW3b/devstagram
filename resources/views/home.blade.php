<!-- esto es una directiva apunta directo a views -->
@extends('layouts.app')

<!-- esto genera una sección que se inyectara en el yield -->
@section('titulo')
  Página Principal
@endsection

@section('contenido')

  {{-- siempre que inicie con una x- es un componenete 
      -Al no cerrar la eiqueta y usar etiqueta de apertura 
      y de cierre se le denomina slot y manda info al componente
      -Los slots actuan como si fueran variables.
  --}}
  {{-- le pado la variable que obtengo del controlador --}}
  <x-listar-post :posts="$posts" />
    

  {{--  --}}

  {{-- Directiva forelse: recorre y coloca una condición --}}
  {{-- @forelse ($posts as $post )
    <h1>{{ $post->titulo }}</h1> 
  @empty
    <p>No hay posts</p> 
  @endforelse --}}

@endsection