
@extends('layouts.main')

@section('content')
    <h1>User Information</h1>
    <div>
        <strong>Login:</strong> {{ $user->login }}
    </div>
    <div>
        <strong>Is Admin:</strong> {{ $user->is_admin ? 'Yes' : 'No' }}
    </div>
    <h2>Add Favorite Place</h2>
    <form method="POST" action="{{ route('user.add_favorite_place', $user) }}">
        @csrf
        <div>
            <label for="name">Place Name:</label>
            <input type="text" name="name" id="name" required>
        </div>
        <button type="submit">Add Place</button>
    </form>

    <a href="{{ route('user.view_favorite_places', $user) }}">View Favorite Places</a>
    <a href="{{ route('user.index') }}">Back to User List</a>
@endsection
