<div>
    <a
        href="#"
        class="uk-icon-button uk-margin-small-right uk-button-primary"
        title="Edit this {{ Str::singular($model->getTable()) }}"
    >
        <x-heroicon-o-pencil />
    </a>
    <a
        href="#"
        class="uk-icon-button uk-margin-small-right uk-button-danger"
        title="Delete this {{ Str::singular($model->getTable()) }}"
    >
        <x-heroicon-o-trash />
    </a>
</div>
