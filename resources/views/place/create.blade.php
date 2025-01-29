@extends('layouts.main')
@section('content')
    <div>
        <form   method="POST" action="{{route('place.store')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" >

            </div>
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="number" name="latitude" class="form-control" id="latitude" >

            </div>
            <div class="mb-3">
                <label for="longitude" class="form-label">Longitude</label>
                <input type="number" name="longitude" class="form-control" id="longitude" >

            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    <a href="{{route('main.index')}}">Main</a>
@endsection
