<?php

namespace App\Services;

use App\Models\Post;

class PostService
{
    /**
     * @var Post
     */
    private $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function comments($post)
    {
        $post = $this->post->findOrFail($post);

        return response()->json([
            'status' => true,
            'comments' => $post->comments
        ]);
    }
}
