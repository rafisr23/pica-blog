@extends('layouts.main')

@section('container')
  {{-- <h1>{{ $title }}</h1> --}}

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 ">
        <h2 class="mb-3">{{ $post->title }}</h2>

        <p> By : <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
        </p>

        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">

        <article class="my-3">
          {!! $post->body !!}
        </article> 

        <a href="/posts" class="text-decoration-none mt-3 d-block">Back To Posts</a>
      </div>
    </div>
  </div>

@endsection
