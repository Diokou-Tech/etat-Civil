<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FormEdit extends Component
{
    public $enfant;

    public function render()
    {
        return view('livewire.form-edit');
    }
}
