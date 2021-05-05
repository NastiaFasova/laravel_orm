<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Text;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Input\Input;

class PostController extends Controller
{
    protected $layout = 'layouts.master';


/**
 * Display the specified resource.
 *
 * @param $post
 * @return Application|Factory|\Illuminate\Contracts\View\View
 */
public function show($post)
{
    $comments = Comment::with('post')->where('post_id', '=', $post->id)->get();
    $author = User::find($post->author_id);
    return view("post.show", [
        "post" => $post,
        "comments" => $comments,
        "author" => $author
    ]);
}

}















