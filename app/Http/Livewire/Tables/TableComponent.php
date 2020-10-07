<?php

namespace App\Http\Livewire\Tables;

use App\Traits\Livewire\Tables\{Paginating, Searching, Sorting, Yajra};

use Livewire\{Component, WithPagination};

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

abstract class TableComponent extends Component
{
    use Paginating,
        Searching,
        Sorting,
        WithPagination,
        Yajra;

     /**
     * TableComponent constructor.
     *
     * @param  null  $id
     */
    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    /**
     * @return Builder
     */
    abstract public function query(): Builder;

    /**
     * @return array
     */
    abstract public function columns(): array;

    /**
     * Render the Livewire component with the columns and models.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('vendor.table', [
            'columns' => $this->columns(),
            'models' => $this->models()->paginate($this->perPage),
        ]);
    }

    /**
     * Build the models depending on
     * the initial query and columns.
     *
     * @return Builder
     */
    public function models()
    {
        $builder = $this->query();

        if (trim($this->search) !== '') {
            $builder->where(function (Builder $builder) {
                foreach ($this->columns() as $column) {
                    if ($column->isSearchable()) {
                        if (is_callable($column->getSearchCallback())) {
                            $builder = app()->call($column->getSearchCallback(), ['builder' => $builder, 'term' => trim($this->search)]);
                        } elseif (Str::contains($column->getAttribute(), '.')) {
                            $relationship = $this->relationship($column->getAttribute());

                            $builder->orWhereHas($relationship->name, function (Builder $builder) use ($relationship) {
                                $builder->where($relationship->attribute, 'like', '%' . trim($this->search) . '%');
                            });
                        } else {
                            $builder->orWhere($builder->getModel()->getTable(). '.' . $column->getAttribute(), 'like', '%' . trim($this->search) . '%');
                        }
                    }
                }
            });
        }

        if (($column = $this->getColumnByAttribute($this->sortField)) !== false && is_callable($column->getSortCallback())) {
            return app()->call($column->getSortCallback(), ['builder' => $builder, 'direction' => $this->sortDirection]);
        }

        return $builder->orderBy($this->getSortField($builder), $this->sortDirection);
    }
}
