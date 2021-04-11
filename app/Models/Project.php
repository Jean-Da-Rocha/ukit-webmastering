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
     * Get the hosting that owns the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hosting()
    {
        return $this->belongsTo(Hosting::class);
    }

    /**
     * Get all users for the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the customer related to the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Get the category related to the project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all task for the project.
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
