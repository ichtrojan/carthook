<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $user)
 * @method findOrFail($id)
 * @method get()
 * @method static find($id)
 * @method count()
 */
class User extends Model
{
    use Cachable;

    protected int $cacheCooldownSeconds = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'username', 'phone', 'website', 'id'
    ];

    /**
     * Get the posts for a user.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'userId');
    }
}
