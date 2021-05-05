@extends('layouts.master')

@section('content')
    <section class="post">
        <header class="page-header">
            <h1>
                {{{ $post->title }}}<br>
                <small>By {{{ $post->author->name }}}</small>
            </h1>
        </header>

        <p>{{ nl2br($post->text->text) }}</p>

        <footer class="well">
            <p>
                <a href="/author/{{ $author->id }}">{{{ $author->name }}}</a> is
                a really smart web developer who regulary contributes to this blog.
            </p>
            <div class="clearfix"></div>
        </footer>
    </section>

    <section class="comments">
        <header>
            <h2>Comments</h2>
        </header>
        @foreach ($comments as $comment)
            <div class="row">
                <div class="col-xs-12">
                    {{{ $comment->user->name }}}:
                    <blockquote>{{{ $comment->text}}}</blockquote>
                </div>
            </div>
        @endforeach
    </section>
@stop
