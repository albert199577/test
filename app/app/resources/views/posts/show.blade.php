@extends('layouts.app')

@section('title', $post->title)

@section('content')

{{-- @if ($post['is_new'])
<div>A new blog post! Using if</div>
@elseif(!$post['is_new'])
<div>Blog post id old! using elseif / else</div>
@endif

@unless ($post['is_new'])
<div>It is an old post ... using unless</div>
@endunless --}}

    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>
    <p>Added {{ $post->created_at->diffForHumans() }}</p>
    @if (now()->diffInMinutes($post->created_at) < 5)
        <x-badge type='danger'>
            New!
        </x-badge>
    @endif

    <h4>Comments</h4>

    @forelse ($post->comments as $comment)
        <p>
            {{ $comment->content }}
        </p>
        <p class="text-muted">
            added {{ $comment->created_at->diffForHumans() }}
        </p>
    @empty
        <p>No comments yet!</p>
    @endforelse

    @include('posts.partials.comment')
{{-- @isset($post['has_comments'])
<div>The post has some comments ... using isset</div>
@endisset --}}
@endsection