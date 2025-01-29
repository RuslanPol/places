@extends('layouts.main')
@section('content')
    <div>
        <ul>
        @foreach($users as $user)
                <li>
                    <a href="{{ route('user.show', $user) }}">{{ $user->login }}</a>
                </li>
        </ul>
        @endforeach
        <a href="{{route('main.index')}}">Main</a>
        <a href="{{route('user.create')}}">AddUser</a>
@endsection
