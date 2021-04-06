<?php

namespace App\Http\Livewire\Backend\Layouts;

use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.backend.layouts.admin-dashboard-component')->layout('layouts.base');
    }
}
