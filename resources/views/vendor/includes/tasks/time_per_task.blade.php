<div>
    @if ($model instanceof \App\Models\Task)
        {{ format_time($model->task_duration) }}
    @else
        00 h 00 min
    @endif
</div>
