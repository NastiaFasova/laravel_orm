<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AuthorController extends Controller {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * Display the specified resource.
     *
     * @param $author
     * @return Application|Factory|View
     */
    public function show($author)
    {
        $author = User::find($author);
        $tags = Tag::with('tag')->where('author_id', '=', $author[0]->id)->get();
        $posts = Post::with('post')->where('author_id', '=', $author[0]->id)->get();
        return view("author.show", [
            "author" => $author,
            "tags" => $tags,
            "posts" => $posts
        ]);
    }

}
