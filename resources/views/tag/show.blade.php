@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Posts tagged with <em>"{{{ $tag->name }}}"</em></h1>
    </div>
    @if(!empty($posts))
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-xs-12">
                <h3>
                    <a href="/post/{{ $post->id }}">{{{ $post->title }}}</a>
                </h3>

                <blockquote>
                    {{ nl2br(Str::words($post->text->text, 80)) }}
                </blockquote>
            </div>
        @endforeach
    </div>
    @else
    <div class="row">

        <div class="col-xs-12">
            <h3>There are no posts</h3>
        </div>
    </div>
    @endif
@stop
