<?php

namespace App\Http\Livewire\Actions\Settings;

use App\Models\Setting;

use Livewire\Component;

class SaveContactEmail extends Component
{
    /** @var */
    public Setting $setting;

    /** @var array */
    protected array $rules = [
        'setting.contact_email' => ['nullable', 'email', 'email:filter', 'max:255'],
    ];

    /**
     * Set the initial setting properties.
     *
     * @return void
     */
    public function mount()
    {
        $this->setting = Setting::first() ?? new Setting();
    }

    /**
     * Save the contact email to storage.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function save()
    {
        $this->setting->save($this->validate());

        session()->flash('success', 'Contact email saved successfully');
    }

    /**
     * Render the component view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.settings.index', [
            'setting' => $this->setting,
        ]);
    }
}