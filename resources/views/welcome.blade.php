{{-- resources/views/home.blade.php или аналогичный файл --}}
@extends('layouts.app', ['breadcrumbItems' => [['title' => 'Главная', 'active' => true]]])

@section('content')
    <x-hero />
    <x-services-showcase />
    <x-about />
    <x-portfolio />
    <x-pricing />
    <x-team />
@endsection
