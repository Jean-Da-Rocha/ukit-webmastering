<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'role_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Get the role linked to the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get all tasks for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Check if the authenticated user has the admin role.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role_id === config('role.admin');
    }

    /**
     * Check if the authenticated user has the webmaster role.
     *
     * @return bool
     */
    public function isWebmaster()
    {
        return $this->role_id === config('role.webmaster');
    }

    /**
     * Check if the authenticated user created a task.
     *
     * @return bool
     */
    public static function hasTasks()
    {
        return in_array(auth()->id(), Task::pluck('user_id')->toArray());
    }
}
