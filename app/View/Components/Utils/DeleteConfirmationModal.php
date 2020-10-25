<?php

namespace App\View\Components\Utils;

use Illuminate\View\Component;

class DeleteConfirmationModal extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('utils.delete_confirmation_modal');
    }
}
