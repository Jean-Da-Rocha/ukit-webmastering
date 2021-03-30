<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * Authorize all admin users by default
     * when a project is created.
     *
     * @return void
     */
    protected static function booted()
    {
        self::created(function ($project) {
            $adminUsers = User::select('id', 'role_id')
                ->where('role_id', config('role.admin'))
                ->pluck('id')
                ->values();

            $project->update(['authorizations' => $adminUsers]);
        });
    }

    /**
     * One To Many (Inverse) relation between Project and Hosting models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Get all authorized user for a specific project.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAuthorizedUsers()
    {
        return User::select('id', 'username')
            ->with($this->joinTasks())
            ->whereIn('id', $this->authorizations)
            ->get();
    }

    /**
     * Join all user tasks for the current project.
     *
     * @return array
     */
    private function joinTasks()
    {
        return [
            'tasks' => fn ($query) => $query
                ->select('id', 'name', 'user_id', 'project_id', 'duration')
                ->where('project_id', $this->id),
        ];
    }
}
