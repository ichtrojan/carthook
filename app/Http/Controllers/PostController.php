<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $post;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->post = new PostService();
    }

    /**
     * @param $post
     * @return JsonResponse
     */
    public function comments($post)
    {
        return $this->post->comments($post);
    }
}
