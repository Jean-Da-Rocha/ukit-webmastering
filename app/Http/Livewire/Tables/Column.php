<?php

namespace App\Http\Livewire\Tables;

use Illuminate\View\View;

use Illuminate\Support\Str;
use App\Traits\Livewire\Tables\Hiddenable;

class Column
{
    use Hiddenable;

    /**
     * @var string
     */
    protected $text;

    /**
     * @var string|null
     */
    protected $attribute;

    /**
     * @var bool
     */
    protected $sortable = false;

    /**
     * @var bool
     */
    protected $searchable = false;

    /**
     * @var View
     */
    protected $view;

    /**
     * @var callable|null
     */
    protected $sortCallback;

    /**
     * @var callable|null
     */
    protected $searchCallback;

    /**
     * Column constructor.
     *
     * @param  string  $text
     * @param  string|null  $attribute
     */
    public function __construct(string $text, ?string $attribute)
    {
        $this->text = $text;
        $this->attribute = $attribute ?? Str::snake(Str::lower($text));
    }

    /**
     * @param  string  $text
     * @param  string|null  $attribute
     *
     * @return Column
     */
    public static function make(string $text, ?string $attribute = null): Column
    {
        return new static($text, $attribute);
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @return mixed
     */
    public function getSortCallback()
    {
        return $this->sortCallback;
    }

    /**
     * @return mixed
     */
    public function getSearchCallback()
    {
        return $this->searchCallback;
    }

    /**
     * @return bool
     */
    public function isSortable()
    {
        return $this->sortable === true;
    }

    /**
     * @return bool
     */
    public function isSearchable()
    {
        return $this->searchable === true;
    }

    /**
     * @param  callable|null  $callable
     * @return $this
     */
    public function sortable(callable $callable = null)
    {
        $this->sortCallback = $callable;
        $this->sortable = true;

        return $this;
    }

    /**
     * @param  callable|null  $callable
     * @return $this
     */
    public function searchable(callable $callable = null)
    {
        $this->searchCallback = $callable;
        $this->searchable = true;

        return $this;
    }

    /**
     * Pass a view element to display in the table column.
     *
     * @param  View  $view
     * @return void
     */
    public function view(View $view)
    {
        $this->view = $view;

        return $this;
    }

    /**
     * Get the view element.
     *
     * @return View
     */
    public function getView()
    {
        return $this->view;
    }
}
