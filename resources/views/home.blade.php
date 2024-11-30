@extends('layouts.baseTemplate')

@section('contenido')

<div class="container black-rounded-div">
    <div class="row">
        <div class="col-sm">
            <h1>{{ __("Bienvenid@") }}, {{ Auth::user()->name }}!</h1>
            <ul>
                <li><h2>Categorías</h2></li>
                    <p>Podras ver todas las categorias disponibles, editarlas, eliminarlas y crear nuevas.</p>
                <li><h2>Mascotas</h2></li>
                    <p>Podras ver todas las mascotas, tanto las que estan disponibles para adopcion como las que ya fueron adoptadas, podras editarlas, eliminarlas y tambien añadir nuevas mascotas.</p>
                <li><h2>Órdenes</h2></li>
                    <p>Podras ver todas las ordenes que fueron realizadas y eliminarlas.</p>
                <li><h2>Donaciones</h2></li>
                    <p>Podras ver todas las donaciones que fueron realizadas.</p>
            </ul>
        </div>
        <div class="col-sm text-center">
            <h1 class="">Meme del día</h1>
            <img src= {{ $meme }} alt="Meme random">
        </div>
    </div>
   
    
</div>

@endsection