<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /**
     * Get all users
     *
     * @return void
     */
    public function testAllUsers()
    {
        $this->seed();

        $response = $this->get('/api/users');

        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'users'
        ]);
    }

    /**
     * Get a user
     *
     * @return void
     */
    public function testGetAUsers()
    {
        $this->seed();

        $id = mt_rand(1, 10);

        $response = $this->get("/api/users/{$id}");

        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'user'
        ]);
    }

    /**
     * Get a non-existent user
     *
     * @return void
     */
    public function testGetANonExistingUser()
    {
        $this->seed();

        $id = mt_rand(11, 100);

        $response = $this->get("/api/users/{$id}");

        $response->assertStatus(404);
    }
}
