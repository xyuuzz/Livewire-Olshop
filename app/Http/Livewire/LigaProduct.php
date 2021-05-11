<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use App\Models\Product;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;


class LigaProduct extends Component
{
    use WithPagination;

    private $product;

    // fungsi mount ini digunakan untuk menerima data yang dikimkan oleh route
    public function mount(Liga $liga)
    {
        $this->product = $liga->product();
    }

    public function render()
    {
        $product = $this->product->paginate(5);
        $tulisan = "Daftar Jersey {$this->product->first()->liga->nama}";
        $route = "Product {$this->product->first()->liga->nama}";
        return view('livewire.product-index', compact("product", "tulisan", "route"));
    }
}
