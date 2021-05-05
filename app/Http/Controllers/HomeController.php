<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.master';

    public function index()
    {
        $user = User::find(1);
        Auth::login($user);
        $posts = Post::with('text')->orderBy('created_at', 'desc')->get();
        return view("home", [
            "posts" => $posts
        ]);
    }

}
