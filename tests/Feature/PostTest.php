<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /**
     * Get posts by a user
     *
     * @return void
     */
    public function testGetUserPosts()
    {
        $this->seed();

        $id = mt_rand(1, 10);

        $response = $this->get("/api/users/{$id}/posts");

        $response->assertStatus(200)->assertJsonStructure([
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
        $this->seed();

        $id = mt_rand(11, 1000);

        $response = $this->get("/api/users/{$id}/posts");

        $response->assertStatus(404);
    }
}
