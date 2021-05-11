<?php

namespace App\Http\Livewire;

use App\Models\{Liga, Product};
use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;

class ProductIndex extends Component
{
    use WithPagination;

    // livewire model untuk menampung query pencarian
    public $search;

    protected $updateQueryString = ['search'];

    // ini untuk mereset page ketika melakukan pencarian
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $product = Product::paginate(5);

        if(strlen($this->search)){
            $product = Product::where("nama", "like", "%{$this->search}%")->paginate(5);
        }

        return view('livewire.product-index', compact('product'));
    }

}
