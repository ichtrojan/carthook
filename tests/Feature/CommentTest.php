<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    /**
     * Get comments to a post
     *
     * @return void
     */
    public function testGetPostComments()
    {
        $this->seed();

        $user = mt_rand(1, 10);

        $post = mt_rand(1, 100);

        $response = $this->get("/api/users/{$user}/posts/{$post}/comments");

        $response->assertStatus(200)->assertJsonStructure([
            'status',
            'comments'
        ]);
    }

    /**
     * Get comments to a non-existent post
     *
     * @return void
     */
    public function testGetNonExistentPostComments()
    {
        $this->seed();

        $user = mt_rand(1, 10);

        $post = mt_rand(101, 1000);

        $response = $this->get("/api/users/{$user}/posts/{$post}/comments");

        $response->assertStatus(404);
    }

    /**
     * Get comments to a User non-existent post
     *
     * @return void
     */
    public function testGetNonExistentUserPostComments()
    {
        $this->seed();

        $user = mt_rand(11, 101);

        $post = mt_rand(1, 100);

        $response = $this->get("/api/users/{$user}/posts/{$post}/comments");

        $response->assertStatus(404);
    }
}
