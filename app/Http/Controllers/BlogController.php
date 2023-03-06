<?php

namespace App\Http\Controllers;

use App\Actions\CreateBlogAction;
use App\Actions\ImportBlogAction;
use App\Http\Requests\CreateBlogRequest;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function home()
    {

        $blogs = Redis::get('blogs');

        if (!$blogs) {
            $blogs = BlogPost::orderBy('id', 'desc')->paginate(100);
            Redis::set('blogs', json_encode($blogs));

            $blogs = Redis::get('blogs');;
        }

        $blogs = json_decode($blogs);

        return view('blogs', compact('blogs'));
    }

    public function description($id)
    {
        $blogs = Redis::get('blogs');
        $blogs = json_decode($blogs);
        $blog = $blogs->data[$id];
        return view('description', compact('blog'));
    }

    public function addBlog()
    {
        return view('add-blog');
    }

    public function createBlog(CreateBlogRequest $request)
    {
        $request->validated();
        return (new CreateBlogAction())->execute($request->validated());
    }
}
