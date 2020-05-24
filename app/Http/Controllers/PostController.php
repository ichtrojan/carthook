<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private PostService $post;

    /**
     * PostController constructor.
     */
    public function __construct()
    {
        $this->post = new PostService();
    }

    /**
     * @param $user
     * @param $post
     * @return JsonResponse
     */
    public function comments($user, $post)
    {
        return $this->post->comments($user, $post);
    }
}
