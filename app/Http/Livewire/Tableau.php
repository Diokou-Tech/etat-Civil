<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Tableau extends Component
{
    public $enfants;
    public function render()
    {
        return view('livewire.tableau');
    }
}
