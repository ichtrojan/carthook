<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $user;

    public function __construct()
    {
        $this->user = new UserService();
    }

    public function all()
    {
        return $this->user->all();
    }

    public function get($user)
    {
        return $this->user->get($user);
    }

    public function posts($user)
    {
        return $this->user->posts($user);
    }
}
