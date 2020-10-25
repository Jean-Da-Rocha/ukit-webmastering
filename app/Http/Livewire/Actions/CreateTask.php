<?php

namespace App\Http\Livewire\Actions;

use App\Models\Project;

use Livewire\Component;

class CreateTask extends Component
{
    // public int $project_id;

    // public bool $quoted;

    // public ?string $quotation_ref;

    // public bool $billed;

    // public ?string $bill_num;



    public function render()
    {
        return view('livewire.tasks.create', [
            'projects' => Project::select('id', 'project_name')->get(),
        ]);
    }
}
