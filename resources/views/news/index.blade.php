@extends('app')

@section('title')
News
    @stop

@section('body')
    @foreach($data as $result)
        <p>{{$result->webTitle}}</p>
    @endforeach
    @stop