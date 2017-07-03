@extends('layouts.default')

@section('title','Blog Detail')

@section('content')
<h1>
    <a href="{{ url('/') }}" class="pull-right fs12">Back</a>
    {{ $post->title }}
</h1>
<p>{!! nl2br(e($post->body)) !!}</p>

<h2>Comments</h2>
<ul>
    @forelse($post -> comments as $comment)
    <li>
        {{ $comment->body }}
        <form action="{{ action('CommentsController@destroy', [$post->id, $comment->id]) }}" id="form_{{ $comment->id }}" method="post" style="display-inline">
            {{ csrf_field() }}
            {{ method_field('delete') }}
        <a href="#" data-id="{{ $comment->id }}" onclick="deleteComment(this);" class="fs12">[x]</a>
        </form>
        </li>
    @empty
    <li>NO Comment yet</li>
    @endforelse
</ul>




<h2>Add New Comment</h2>
<form method="post" action="{{ action('CommentsController@store', $post->id) }}">
    {{ csrf_field() }}
    <p>
        <input type="text" name="body" placeholder="body" value="{{ old('body') }}">
        @if($errors->has('body'))
        <span class="error">{{ $errors->first('body') }}</span>
        @endif
    </p>
    <p>
        <input type="submit" value="Add Comment">
    </p>
</form>

<script>
    function deleteComment(e){
        'use strict';
        
        if(confirm('are you sure?')){
            document.getElementById('form_' + e.dataset.id).submit();
        }
    }
    
</script>

@endsection
        