@extends('layouts.main')

@section('content')
    <h1>Favorite Places for {{ $user->login }}</h1>
    <ul>
        @foreach($favoritePlaces as $place)
            <li>{{ $place->name }}</li>
        @endforeach
    </ul>
    <a href="{{ route('user.show', $user) }}">Back to User Information</a>
@endsection
