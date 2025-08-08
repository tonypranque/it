{{-- resources/views/home.blade.php или аналогичный файл --}}
@extends('layouts.app', ['breadcrumbItems' => [['title' => 'Главная', 'active' => true]]])

@section('content')
    <x-hero />
    <x-services-showcase />
    <x-about />
    <x-team />
    <x-portfolio />
    <x-pricing />
@endsection
