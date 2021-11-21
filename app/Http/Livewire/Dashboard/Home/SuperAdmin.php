<?php

namespace App\Http\Livewire\Dashboard\Home;

use App\Models\Order;
use App\Models\RealEstate;
use App\Models\User;
use Livewire\Component;

class SuperAdmin extends Component
{

    public function mount()
    {
     
    }
    public function render()
    {
        return view('livewire.dashboard.home.super-admin');
    }
}
