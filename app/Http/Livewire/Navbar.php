<?php

namespace App\Http\Livewire;

use App\Models\Liga;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navbar extends Component
{
    public $listeners = [
        "orderSuccess" => "updateKeranjang",
    ];

    public $jumlah = 0;

    public function mount()
    {
        // menggunakan operator null, jika salah satu object bernilai null, maka nilai variabel tsb adalah null
        if($pesanan = Auth::user()?->order?->where("status", 0)->first()?->order_detail?->count()) {
            $this->jumlah = $pesanan;
        }
    }

    public function render()
    {
        return view('livewire.navbar', [
            "liga" => Liga::get("nama"),
            "jumlah_pesanan" => $this->jumlah
        ]);
    }


    public function updateKeranjang()
    {
        if($pesanan = Auth::user()?->order?->where("status", 0)->first()?->order_detail?->count()) {
            $this->jumlah = $pesanan;
        } else { $this->jumlah = 0; }
    }

}
