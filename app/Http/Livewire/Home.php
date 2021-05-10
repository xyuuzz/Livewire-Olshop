<?php

namespace App\Http\Livewire;

use App\Models\{Product, Liga};
use Livewire\Component;

class Home extends Component
{
    public $product;

    public function render()
    {
        $this->product = Product::take(6)->get();
        $liga = Liga::all();
        return view('livewire.home', [
            "product" => $this->product,
            "liga" => $liga
        ]);
    }

    public function ligaButton($id)
    {
        $product = Product::where("liga_id", $id)->take(6)->get();
        $this->emit("LigaProduct", $product);
    }
}
