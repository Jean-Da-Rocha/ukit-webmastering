<?php

namespace App\Http\Livewire\Tables;

use App\Traits\Livewire\Tables\Hiddenable;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Column
{
    use Hiddenable;

    /**
     * @var string
     */
    private string $text;

    /**
     * @var string
     */
    private string $attribute;

    /**
     * @var bool
     */
    private bool $sortable = false;

    /**
     * @var bool
     */
    private bool $searchable = false;

    /**
     * @var string|null
     */
    private string $viewName = '';

    /**
     * @var bool
     */
    private bool $raw = false;

    /**
     * @var string
     */
    private string $htmlContent = '';

    /**
     * @var callable|null
     */
    private $sortCallback;

    /**
     * @var callable|null
     */
    private $searchCallback;

    /**
     * @var callable|null
     */
    private $formatCallback;

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
     * Create a new column object with its name and attribute.
     *
     * @param  string  $text
     * @param  string|null  $attribute
     *
     * @return Column
     */
    public static function make(string $text, ?string $attribute = null)
    {
        return new static($text, $attribute);
    }

    /**
     * Get the text content.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Get the attribute content.
     *
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Get the sort callback if there is any.
     *
     * @return callable|null
     */
    public function getSortCallback()
    {
        return $this->sortCallback;
    }

    /**
     * Get the search callback if there is any.
     *
     * @return callable|null
     */
    public function getSearchCallback()
    {
        return $this->searchCallback;
    }

    /**
     * Check whether the column is sortable or not.
     *
     * @return bool
     */
    public function isSortable()
    {
        return $this->sortable === true;
    }

    /**
     * Check whether the column is searchable or not.
     *
     * @return bool
     */
    public function isSearchable()
    {
        return $this->searchable === true;
    }

    /**
     * Make the column sortable with an optional callback.
     *
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
     * Make the column searchable with an optional callback.
     *
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
     * Show a view element in the column.
     *
     * @param  string  $view
     * @return $this
     */
    public function view(string $viewName)
    {
        $this->viewName = $viewName;

        return $this;
    }

    /**
     * Get the view element.
     *
     * @return $this
     */
    public function getViewName()
    {
        return $this->viewName;
    }

    /**
     * Display the column format using `{!!  !!}`
     * rather than `{{  }}`.
     *
     * @param  string  $htmlContent
     * @return $this
     */
    public function raw()
    {
        $this->raw = true;

        return $this;
    }

    /**
     * Check if the column needs to be output
     * in a raw format.
     *
     * @return $this
     */
    public function isRaw()
    {
        return $this->raw === true;
    }

    /**
     * Get the HTML content that needs to be output.
     *
     * @return string
     */
    public function getHtmlContent()
    {
        return $this->htmlContent;
    }

    /**
     * Format a column with specific data.
     *
     * @param  callable  $callable
     * @return $this
     */
    public function format(callable $callable)
    {
        $this->formatCallback = $callable;

        return $this;
    }

    /**
     * Check if the format callback is callable.
     *
     * @return bool
     */
    public function isFormatted()
    {
        return is_callable($this->formatCallback);
    }

    /**
     * Call the format callback on the current model and column.
     *
     * @param  Model  $model
     * @param  Column  $column
     * @return mixed
     */
    public function formatted(Model $model, Column $column)
    {
        return app()->call($this->formatCallback, ['model' => $model, 'column' => $column]);
    }
}
