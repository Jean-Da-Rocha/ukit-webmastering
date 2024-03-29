<?php

namespace App\Traits\Livewire;

trait WithDeleteConfirmation
{
    /**
     * The provided model's id.
     *
     * @var int
     */
    public int $modelId = 0;

    /**
     * The provided model's table name.
     *
     * @var string
     */
    public string $modelClassName = '';

    /**
     * Get the model's id and table name.
     *
     * @param  int  $modelId
     * @param  string  $modelClassName
     * @return void
     */
    public function getModelIdentifiers(int $modelId, string $modelClassName)
    {
        $this->modelId = $modelId;
        $this->modelClassName = $modelClassName;
    }

    /**
     * Delete the model according to
     * its provided id and class name.
     *
     * @return void
     */
    public function delete()
    {
        $entity = get_model($this->modelClassName)->findOrFail($this->modelId);

        $entity->delete();

        $this->emitSelf('$refresh');

        // Refresh other components that call this event if needed.
        $this->emit('update-component');

        session()->flash('success', trans('message.deleted'));
    }
}
