<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $comment)
 * @method static find($id)
 */
class Comment extends Model
{
    use Cachable;

    protected int $cacheCooldownSeconds = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'postId', 'email', 'name', 'body', 'id'
    ];

    /**
     * Delay return if no record is present
     * to give time to make the API call
     */
    protected static function boot()
    {
        parent::boot();

        if (static::count() == 0) {
            sleep(2);
        }
    }
}
