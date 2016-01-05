@extends('app')

@section('title')
News
    @stop

@section('body')
    @foreach($data as $result)
        <p style="font-size:{{$font}}}}">{{$result->webTitle}}</p>
    @endforeach
    @stop