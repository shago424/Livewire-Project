<?php

namespace App\Http\Livewire\Backend\Layouts;

use Livewire\Component;

class HomeCoponent extends Component
{
    public function render()
    {
        return view('livewire.backend.layouts.home-coponent')->layout('layouts.base');
    }
}
