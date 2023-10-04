@extends('layouts.app')

@section('content')

    <div class="album py-5 bg-body-tertiary">
        <div class="container">

            <div class="d-flex mb-4">
                <h2 class="me-3">Lessons</h2>
                <a href="{{route('lessons.create')}}" class="btn btn-primary">Add lesson</a>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($lessons as $lesson)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p class="card-text">{{$lesson->title}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-secondary">View</a>
                                    <a class="btn btn-sm btn-outline-secondary">Edit</a>
                                </div>
                                <small class="text-body-secondary">{{$lesson->user->name}}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
