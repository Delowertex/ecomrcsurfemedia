<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AdminDashboardComponnet extends Component
{
    public function render()
    {
        return view('livewire.admin.admin-dashboard-componnet')->layout('layouts.base');
    }
}
