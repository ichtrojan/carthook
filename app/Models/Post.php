<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $post)
 * @method findOrFail($post)
 * @method static find($id)
 * @method count()
 */
class Post extends Model
{
    use Cachable;

    protected int $cacheCooldownSeconds = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'userId', 'title', 'body'
    ];

    /**
     * Get all of the post's comments.
     */
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'postId');
    }

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
