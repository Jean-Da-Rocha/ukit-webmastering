<?php

namespace App\Http\Livewire\Actions\Categories;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseCategory extends Component
{
    use AuthorizesRequests;

    /**
     * @var Category
     */
    public Category $category;

    /**
     * @var bool
     */
    public bool $updateMode = false;

    /**
     * @var array
     */
    protected array $rules = [
        'category.type' => ['required', 'string', 'max:255'],
    ];

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->authorize('performAdminAction');

        return view('livewire.categories.create_edit_form', [
            'category' => $this->category,
        ]);
    }
}
