<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * @var User
     */
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function all()
    {
        return response()->json([
           'status' => true,
           'users' => $this->user->get()
        ]);
    }

    public function get($user)
    {
        return response()->json([
            'status' => true,
            'user' => $this->user->findOrFail($user)
        ], 200);
    }

    public function posts($user)
    {
        $user = $this->user->findOrFail($user);

        return response()->json([
            'status' => true,
            'posts' => $user->posts
        ], 200);
    }
}
