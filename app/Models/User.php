<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $user)
 * @method findOrFail($id)
 * @method get()
 */
class User extends Model
{
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
        return $this->hasMany('App\Models\Post');
    }
}
