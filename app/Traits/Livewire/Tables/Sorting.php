<?php

namespace App\Traits\Livewire\Tables;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

trait Sorting
{
    /**
     * The initial field to be sorting by.
     *
     * @var string
     */
    public string $sortField = 'id';

    /**
     * The initial direction to sort.
     *
     * @var string
     */
    public string $sortDirection = 'asc';

    /**
     * Sort the direction by ascending or descending order.
     *
     * @param  string  $attribute
     * @return void
     */
    public function sort(string $attribute)
    {
        if ($this->sortField !== $attribute) {
            $this->sortDirection = 'asc';
        } else {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        }

        $this->sortField = $attribute;
    }

    /**
     * Get the relationship of the attribute if there is any.
     *
     * @param  Builder  $builder
     * @return string
     */
    protected function getSortField(Builder $builder)
    {
        if (Str::contains($this->sortField, '.')) {
            $relationship = $this->relationship($this->sortField);

            return $this->attribute($builder, $relationship->name, $relationship->attribute);
        }

        return $this->sortField;
    }
}
