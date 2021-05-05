<?php
namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class TagController extends Controller {

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    /**
     * Display the specified resource.
     *
     * @param $name
     * @return Application|Factory|View
     */
    public function show($name)
    {
        // get tag by tag name, eager load posts
        $tag = Tag::find($name);
        $posts_id = DB::table('post_tags')->where('tag_id', '=', $name)->get();
        $posts = [];
        foreach ($posts_id as $post){
            array_push($posts, Post::find($post->post_id));
        }

        return view("tag.show", [
            "tag" => $tag,
            "posts" => $posts
        ]);
    }

}
