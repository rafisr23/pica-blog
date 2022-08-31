@extends('layouts/main')

@section('container')
  <h1 class="text-center mb-3">{{ $title }}</h1>

  <div class="row justify-content-center mb-3">
    <div class="col-md-6">
      <form action="/posts" method="get">
        <div class="input-group mb-3">
          @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
          @endif
          @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
          @endif
          <input type="text" class="form-control" placeholder="Enter keyword.." name="search" value="{{ request('search') }}">
          <button class="btn btn-primary" type="submit">Search</button>
        </div>
      </form>
    </div>
  </div>

  @if ($posts->count())
    <div class="card mb-3">
      <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
        alt="{{ $posts[0]->category->name }}">
      <div class="card-body text-center">
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">
          <h3 class="card-title">{{ $posts[0]->title }}</h3>
        </a>
        <small>
          <p>By : <a href="/posts?author={{ $posts[0]->author->username }}"
              class="text-decoration-none">{{ $posts[0]->author->name }}</a>
            in <a href="/posts?category={{ $posts[0]->category->slug }}"
              class="text-decoration-none">{{ $posts[0]->category->name }}</a>
            {{ $posts[0]->created_at->diffForHumans() }}
          </p>
        </small>
        <p class="card-text">{{ $posts[0]->excerpt }}</p>
        <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
      </div>
    </div>

  <div class="container">
    <div class="row">
      @foreach ($posts->skip(1) as $post)
        <div class="col-md-4 mb-3">
          <div class="card h-100">
            <div class="position-absolute bg-dark px-3 py-2 rounded" style="--bs-bg-opacity: .8"><a
                class="text-decoration-none text-white" href="/posts?category={{ $post->category->slug }}">
                {{ $post->category->name }}</a>
            </div>
            <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
              alt="{{ $post->category->name }}">
            <div class="card-body">
              <h5 class="card-title">{{ $post->title }}</h5>
              <small>
                <p>By : <a href="/posts?author={{ $post->author->username }}"
                    class="text-decoration-none">{{ $post->author->name }}</a>
                  {{ $post->created_at->diffForHumans() }}
                </p>
              </small>
              <p class="card-text">{{ $post->excerpt }}</p>
              <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

  @else
    <p>No Post Found.</p>
  @endif

  {{ $posts->links() }}

@endsection
