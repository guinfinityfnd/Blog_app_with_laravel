@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> {{ session('status') }}.
  </div>
    @endif
    <div class="row justify-content-center">
        <div class="card-header text-center">
            <a href="/posts/create" class="btn btn-primary d-block">Create New Posts</a>
        </div><br><br>
        <div class="col-md-8">
            @foreach ($data as $post)
            <div class="card mb-5">
                <div class="card-body">
                    <h3 class="card-title text-danger">{{ $post->name }}</h3>
                    <p class="card-text">{{ $post->description }}</p>
                    <div class="d-flex">
                        <a href="/posts/{{ $post->id }}" class="btn btn-primary me-3">View</a>
                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary me-3">Edit</a>
                        <form action="/posts/{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary">Delete</button>
                        </form>
                    </div>
                </div>
                <!-- <div class="card-body"> -->

                <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif -->

                <!-- {{ __('You are logged in!') }} -->
                <!-- </div> -->
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection