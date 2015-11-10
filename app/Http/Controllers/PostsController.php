<?php

namespace App\Http\Controllers;

use App\Contracts\PostRepositoryInterface;
use App\Http\Requests;

class PostsController extends Controller
{
    /**
     * @var PostRepositoryInterface
     */
    protected $posts;

    /**
     * PostsController constructor.
     * @param $posts
     */
    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts->getLatest3Posts();
        $data = compact('posts');
        return View('posts.index', $data);
    }
}
