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
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * One To Many (Inverse) relation between User and Role models.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * One To Many relation between User and Task models.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
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
}
