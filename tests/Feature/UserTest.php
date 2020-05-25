<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /**
     * Get all users
     *
     * @return void
     */
    public function testAllUsers()
    {
        $response = $this->get('/api/users');

        $response->assertSuccessful()->assertJsonStructure([
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
        $id = mt_rand(1, 10);

        $response = $this->get("/api/users/{$id}");

        $response->assertSuccessful()->assertJsonStructure([
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
        $id = mt_rand(11, 100);

        $response = $this->get("/api/users/{$id}");

        $response->assertNotFound();
    }
}
