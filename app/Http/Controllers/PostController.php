<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @param User $user
     * @param Post $post
     * @return JsonResponse
     */
    public function comments(User $user, Post $post)
    {
        return response()->json([
            'status' => true,
            'comments' => $post->comments
        ]);
    }
}
