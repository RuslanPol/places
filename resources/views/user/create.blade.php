@extends('layouts.main')
@section('content')
    <div>
        <form  method="POST" action="{{route('user.store')}}">
            @csrf
    <div class="mb-3">
        <label for="login" class="form-label">Login</label>
        <input type="text" name="login" class="form-control" id="login">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
            <div>
                <label for="is_admin"> Admin:</label>
                <input type="checkbox" name="is_admin" id="is_admin" value="1">
            </div>

    <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
