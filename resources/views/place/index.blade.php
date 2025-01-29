@extends('layouts.main')
@section('content')
    <div>
        @foreach($places as $place)
            <div>{{$place->name}}
            </div>
        @endforeach
        <a href="{{route('main.index')}}">Main</a>
        <a href="{{route('place.create')}}">AddPlace</a>
@endsection
