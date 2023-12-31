@extends('layouts.template')

@section('title')
    About page
@endsection

@push('header')
    About US
@endpush

@section('content')
    @include('includes.pageHeader')
    @include('includes.about')
    @include('includes.callToAction')
    @include('includes.team')
@endsection

