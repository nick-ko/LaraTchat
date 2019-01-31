@extends('layouts.welcome')

@section('title')
    123 Causons
@endsection

@section('content')

@include('includes.conversation_header')
@include('includes.users',['users'=>$users])

@endsection


 