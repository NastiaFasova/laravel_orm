<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\View;

class CategoryController extends Controller {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * Display the specified resource.
     *
     * @param Category $title
     * @return Application|Factory|\Illuminate\Contracts\View\View
     */
    public function show(Category $title)
    {
        $category = Category::find($title);
        $comments = Comment::with('comment')->where('category_id', '=', $category[0]->id)->get();
        $posts = Post::with('post')->where('category_id', '=', $category[0]->id)->get();
        return view("category.show", [
            "category" => $category,
            "posts" => $posts,
            "comments" => $comments
        ]);
    }

}
