@extends('dashboard.layouts.main')

@section('content')
<div class="container">
  <div class="row my-3">
    <div class="col-lg-8 ">
      <h2 class="mb-3">{{ $post->title }}</h2>

      <a href="/dashboard/posts" class="btn btn-success"><i class="bi bi-arrow-left"></i> Back to my posts</a>
      <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Edit</a>
      <a href="" class="btn btn-danger"><i class="bi bi-x-circle"></i> Delete</a>

      <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top mt-3" alt="{{ $post->category->name }}">

      <article class="my-3">
        {!! $post->body !!}
      </article> 

    </div>
  </div>
</div>
@endsection