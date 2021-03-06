@extends('layouts.master')

@section('content')
	<div class="page-header">
		<h1>Recent Posts</h1>
	</div>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col-xs-12">
            	<h3>
                	<a href="/post/{{ $post->id }}">{{{ $post->title }}}</a>
            	</h3>
            	<blockquote>
            		{{ (Str::words($post->text['text'], 80)) }}
        		</blockquote>
            </div>
        @endforeach
    </div>
@stop
