<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class History extends Component
{
    public function render()
    {
        $order = Auth::user()->order()->where("status", '!=', 0)->latest()->paginate(3);
        return view('livewire.history', compact("order"));
    }
}
