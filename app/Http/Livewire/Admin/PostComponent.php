<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class PostComponent extends Component
{
    public function render()
    {
        return view('livewire.admin.post-component')->layout('layouts.base');
    }
}
