<div>
    <a
        href="{{ has_route($model->getTable() . '.edit', $model->id) }}"
        class="uk-icon-button uk-margin-small-right uk-button-primary"
        title="Edit this {{ model_name($model) }}"
    >
        <x-heroicon-o-pencil />
    </a>
    <a
        href="#"
        class="uk-icon-button uk-margin-small-right uk-button-danger"
        data-uk-toggle="target: #modal-remove"
        title="Delete this {{ model_name($model) }}"
        wire:click="$emit('getModelIdentifiers', '{{ $model->id }}', '{{ class_basename($model) }}')"
    >
        <x-heroicon-o-trash />
    </a>
</div>
