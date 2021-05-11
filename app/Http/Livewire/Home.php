<?php

namespace App\Http\Livewire;

use App\Models\{Product, Liga};
use Livewire\Component;

class Home extends Component
{
    public $product;

    public function render()
    {
        // mengambil 6 produk
        $this->product = Product::take(6)->get();
        // mengambil semua liga
        $liga = Liga::all();

        return view('livewire.home', [
            "product" => $this->product,
            "liga" => $liga
        ]);
    }
}
