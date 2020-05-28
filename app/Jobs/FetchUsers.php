<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\CurlService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchUsers implements ShouldQueue
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
        $users = $this->curl->get("https://jsonplaceholder.typicode.com/users/");

        foreach ($users as $user){
            tap($user['id'], function ($id) use ($user) {
                unset($user['id']);
                User::updateOrCreate(['id' => $id], (array)$user);
            });
        }
    }
}
