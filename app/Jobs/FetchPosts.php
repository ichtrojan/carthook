<?php

namespace App\Jobs;

use App\Models\Post;
use App\Services\CurlService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchPosts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var CurlService
     */
    private CurlService $curl;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->curl = new CurlService();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $posts = $this->curl->get("https://jsonplaceholder.typicode.com/posts/");

        foreach ($posts as $post){
            try {
                Post::create($post);
            } catch (\Exception $exception) {
                $post = Post::find($post['id']);
                $post->update((array)$post);
            }
        }
    }
}
