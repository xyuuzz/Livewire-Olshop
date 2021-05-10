<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Liga extends Component
{
    public function render()
    {
        $product = Product::paginate(1);
        return view('livewire.liga', compact("product"));
    }
}
