<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        dd(auth('web')->user());
        return view('livewire.dashboard');
    }
}
