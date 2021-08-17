<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class UserDashboardComponnet extends Component
{
    public function render()
    {
        return view('livewire.user.user-dashboard-componnet')->layout('layouts.base');
    }
}
