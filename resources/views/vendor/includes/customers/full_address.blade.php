<div>
    @if ($model->address && $model instanceof \App\Models\Customer)
        {{ $model->address }}, {{ $model->zip_code }}, {{ $model->city }}
    @endif
</div>
