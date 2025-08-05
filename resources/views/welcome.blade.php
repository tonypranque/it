@extends('layouts.app')

@section('content')
{{--    <x-breadcrumbs :items="[
    ['title' => 'Главная', 'url' => '/', 'active' => false],
    ['title' => 'Услуги', 'url' => '/services', 'active' => false],
    ['title' => 'Разработка мобильных приложений', 'active' => true]
]" />--}}
    <x-hero />
<x-services-showcase />
    <x-about />
    <x-team />
    <x-portfolio />
    <x-contact />

@endsection
