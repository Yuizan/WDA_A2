@extends('layouts.master')
@section('title','home')
@section('css','home')
@section('js','global')

@section('content')
    @parent
    @include('shared.contents.homeContent')
@stop
