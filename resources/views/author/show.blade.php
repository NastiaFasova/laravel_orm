@extends('layouts.master')

@section('content')
    <section class="author">
        <header class="page-header">

            <h1>
                {{{ $author[0]->name }}}<br>
            </h1>

            <div class="clearfix"></div>
        </header>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Tags</h3>
            </div>

            <div class="panel-body">
                <ul>
                    @foreach ($tags as $tag)
                        <li>
                            <a href="/tag/{{ Str::lower($tag->id) }}">{{ $tag->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Posts</h3>
            </div>

            <div class="panel-body">
                @foreach ($posts as $post)
                    <h3>
                        <a href="/post/{{ $post->id }}">{{{ $post->title }}}</a>
                    </h3>

                    <blockquote>
                        {{ nl2br(Str::words($post->text->text, 20)) }}
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>
@stop
