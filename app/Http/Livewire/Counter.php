<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        return view('livewire.counter', [
            'users' => User::where('username', $this->search)->get(),
        ]);
    }
}
