<div>
    @if ($model instanceof \App\Models\Task)
        {{ formatTime($model->task_duration) }}
    @endif
</div>
