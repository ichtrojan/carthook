<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $user;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->user = new UserService();
    }

    /**
     * @return JsonResponse
     */
    public function all()
    {
        return $this->user->all();
    }

    /**
     * @param $user
     * @return JsonResponse
     */
    public function get($user)
    {
        return $this->user->get($user);
    }

    /**
     * @param $user
     * @return JsonResponse
     */
    public function posts($user)
    {
        return $this->user->posts($user);
    }
}
