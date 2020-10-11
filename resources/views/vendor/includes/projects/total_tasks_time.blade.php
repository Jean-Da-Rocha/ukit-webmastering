@inject('projectRepository', 'App\Repositories\ProjectRepository')

<div>
    {{ $projectRepository->getTotalTasksTime($model) }}
</div>
