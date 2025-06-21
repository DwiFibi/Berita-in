@extends('layouts.app')

@section('tittle', 'Beritain')

@section('content')
    @include('partials.navbar')
    @include('partials.header')
    @include('partials.trending')
    @include('partials.featured')
    @include('partials.latest')
    @include('partials.author')
    @include('partials.hightlights')
    @include('partials.footer')
    @if (isset($article))
        @include('articles.singlepost')
    @endif

@endsection
