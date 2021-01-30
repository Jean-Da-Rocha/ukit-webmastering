<?php

namespace App\Http\Livewire\Actions\Categories;

use App\Models\Category;

class EditCategory extends BaseCategory
{
    /**
     * Set the initial category properties.
     *
     * @param  int  $id
     * @return void
     */
    public function mount(int $id)
    {
        $this->updateMode = true;

        $this->category = Category::findOrFail($id);
    }

    /**
     * Update the specified category in storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {
        $this->category->update($this->validate());

        session()->flash('success', trans('message.updated'));

        return redirect()->to('/categories');
    }
}
