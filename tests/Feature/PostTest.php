<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /**
     * Get posts by a user
     *
     * @return void
     */
    public function testGetUserPosts()
    {
        $id = mt_rand(1, 10);

        $response = $this->get("/api/users/{$id}/posts");

        $response->assertSuccessful()->assertJsonStructure([
            'status',
            'posts'
        ]);
    }

    /**
     * Get posts by a non existent useruser
     *
     * @return void
     */
    public function testGetANonExistentUserPosts()
    {
        $id = mt_rand(11, 1000);

        $response = $this->get("/api/users/{$id}/posts");

        $response->assertNotFound();
    }
}
