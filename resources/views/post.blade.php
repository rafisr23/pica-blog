@extends('layouts.main')

@section('container')
  {{-- <h1>{{ $title }}</h1> --}}

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 mb-5">
        <h2 class="mb-3">{{ $post->title }}</h2>

        <p> By : <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a>
        </p>

        @if ($post->image)
          <img src="{{ asset('storage/'. $post->image) }}" alt="{{ $post->category->name }}" style="object-fit:cover;
          object-position: center;
          width:800px;
          height:400px;">
        @else
          <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
        @endif

        <article class="my-3">
          {!! $post->body !!}
        </article> 

        <a href="/posts" class="text-decoration-none mt-3 d-block">Back To Posts</a>
      </div>
    </div>
  </div>

@endsection
