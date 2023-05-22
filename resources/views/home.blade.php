@extends('layouts.baseTemplate')

@section('content')


<div class="home-page">
<h1>{{ __("Bienvenid@") }}, {{ Auth::user()->name }}!</h1>
</div>

@endsection