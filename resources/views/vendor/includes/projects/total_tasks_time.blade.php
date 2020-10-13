@inject('project', 'App\Actions\TasksCalculation')

<div>
    {{ $project->getTotalTasksTime($model) }}
</div>
