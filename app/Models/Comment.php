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
}
