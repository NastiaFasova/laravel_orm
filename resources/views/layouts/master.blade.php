<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>My Code Blog</title>

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">My Code Blog</a>
                </div>

                <ul class="nav navbar-nav">
                    @foreach (App\Models\Category::all() as $category)
                        <li><a href="/category/{{ $category->id }}">{{ $category->title }}</a></li>
                    @endforeach
                </ul>
                @if (Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="active">{{ Auth::user()->name }}</a>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>

        <div class="container">
            <div class="row">
                <div class="content col-xs-8">
                    @yield('content')
                </div>

                <div class="sidebar col-xs-4">
                    @section('sidebar')

                        <div class="tags">
                            <h4>Popular Tags</h4>
                            <ul>
                                @foreach (App\Models\Tag::all() as $tag)
                                    <li>
                                        <a href="/tag/{{ Str::lower($tag->id) }}">{{ $tag->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @show
                </div>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    </body>
</html>
