@extends('layouts.baseTemplate')

@section('content')


<div>
<h1>{{ __("Bienvenid@") }}, {{ Auth::user()->name }}!</h1>
</div>

@endsection