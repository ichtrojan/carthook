<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostService
{
    /**
     * @var Post
     */
    private $post;

    /**
     * PostService constructor.
     */
    public function __construct()
    {
        $this->post = new Post();
    }

    /**
     * Return all comments belonging to a Post
     *
     * @param $post
     * @return JsonResponse
     */
    public function comments($post)
    {
        $post = $this->post->findOrFail($post);

        return response()->json([
            'status' => true,
            'comments' => $post->comments
        ]);
    }
}
