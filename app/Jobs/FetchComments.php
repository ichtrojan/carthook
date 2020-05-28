<?php

namespace App\Jobs;

use App\Models\Comment;
use App\Services\CurlService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchComments implements ShouldQueue
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
        $comments = $this->curl->get("https://jsonplaceholder.typicode.com/comments/");

        foreach ($comments as $comment){
            tap($comment['id'], function ($id) use ($comment) {
                unset($comment['id']);
                Comment::updateOrCreate(['id' => $id], (array)$comment);
            });
        }
    }
}
