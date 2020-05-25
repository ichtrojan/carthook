<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @param Post $post
     * @return JsonResponse
     */
    public function comments(Post $post)
    {
        return response()->json([
            'status' => true,
            'comments' => $post->comments
        ]);
    }
}
