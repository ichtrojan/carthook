<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function all()
    {
        return response()->json([
            'status' => true,
            'users' => User::all(),
        ]);
    }

    /**
     * @param $user
     * @return JsonResponse
     */
    public function get(User $user)
    {
        return response()->json([
            'status' => true,
            'user' => $user
        ]);
    }

    /**
     * @param $user
     * @return JsonResponse
     */
    public function posts(User $user)
    {
        return response()->json([
            'status' => true,
            'posts' => $user->posts
        ]);
    }
}
