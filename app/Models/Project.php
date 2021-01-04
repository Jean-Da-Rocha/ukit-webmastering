<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['authorizations' => 'json'];

    /**
     * One To Many (Inverse) relation between Project and Hosting models.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hosting()
    {
        return $this->belongsTo(Hosting::class);
    }

    /**
     * One To Many (Inverse) relation between Project and User models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * One To Many (Inverse) relation between Project and Customer models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * One To Many (Inverse) relation between Project and Category models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * One To Many relation between Project and Task models.
     *
     * @return HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function getAuthorizedUsers()
    {
        return $this->users
            ->with('tasks')
            ->whereIn('users.id', $this->authorizations)
            ->get();
    }
}
