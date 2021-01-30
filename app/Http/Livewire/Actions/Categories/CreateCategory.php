<?php

namespace App\Http\Livewire\Actions\Categories;

use App\Models\Category;

class CreateCategory extends BaseCategory
{
    /**
     * Set the initial category properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->updateMode = false;

        $this->category = new Category();
    }

    /**
     * Store a newly created category in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $this->category->save($this->validate());

        session()->flash('success', trans('message.created'));

        return redirect()->to('/categories');
    }
}
