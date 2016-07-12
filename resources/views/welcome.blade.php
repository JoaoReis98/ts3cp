@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    @include('common.errors')
    <p>{{ $username }}</p>
@endsection