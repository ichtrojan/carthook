<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class PostService
{
    /**
     * @var Post
     */
    private Post $post;

    /**
     * @var User
     */
    private User $user;

    /**
     * PostService constructor.
     */
    public function __construct()
    {
        $this->post = new Post();
        $this->user = new User();
    }

    /**
     * Return all comments belonging to a Post
     *
     * @param $user
     * @param $post
     * @return JsonResponse
     */
    public function comments($user, $post)
    {
        $post = $this->post->findOrFail($post);

        $this->user->findOrFail($user);

        return response()->json([
            'status' => true,
            'comments' => $post->comments
        ]);
    }
}
