@props(['post'])
<div class="card mb-4">
    <img src="{{ $post->image }}" class="card-img-top" alt="Blog Post 1">
    <div class="card-body">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-text">
            {{ $post->body }}
        </p>
        <a href="posts/{{ $post->id }}" class="btn btn-primary">Read More &rarr;</a>
    </div>
    <div class="card-footer text-muted">
        Posted on January 1, 2022 by
        <a href="#">Author</a>
    </div>
</div>
