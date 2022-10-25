@extends('layout')

@section('title', __("site.$title"))

@section('content')
    <h1>
        {{ __("site.$title") }}
    </h1>

    <x-standalone title="Salut" />
@endsection
