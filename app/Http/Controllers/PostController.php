<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $post;

    public function __construct()
    {
        $this->post = new PostService();
    }

    public function comments($post)
    {
        return $this->post->comments($post);
    }
}
