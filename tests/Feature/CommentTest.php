<?php

namespace Tests\Feature;

use Tests\TestCase;

class CommentTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();
    }

    /**
     * Get comments to a post
     *
     * @return void
     */
    public function testGetPostComments()
    {
        $post = mt_rand(1, 100);

        $response = $this->get("/api/users/posts/{$post}/comments");

        $response->assertSuccessful()->assertJsonStructure([
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
        $post = mt_rand(101, 1000);

        $response = $this->get("/api/posts/{$post}/comments");

        $response->assertNotFound();
    }
}
