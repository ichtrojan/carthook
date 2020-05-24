<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserService
{
    /**
     * @var User
     */
    private User $user;

    /**
     * UserService constructor.
     */
    public function __construct()
    {
        $this->user = new User();
    }

    /**
     * Return all users
     *
     * @return JsonResponse
     */
    public function all()
    {
        return response()->json([
           'status' => true,
           'users' => $this->user->get()
        ]);
    }

    /**
     * Return a single user
     *
     * @param $user
     * @return JsonResponse
     */
    public function get($user)
    {
        return response()->json([
            'status' => true,
            'user' => $this->user->findOrFail($user)
        ], 200);
    }

    /**
     * Get posts belonging to a user
     *
     * @param $user
     * @return JsonResponse
     */
    public function posts($user)
    {
        $user = $this->user->findOrFail($user);

        return response()->json([
            'status' => true,
            'posts' => $user->posts
        ], 200);
    }
}
