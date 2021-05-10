<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class Keranjang extends Component
{
    protected $pesanan, $pesanan_detail;

    public function render()
    {
        $this->pesanan = Auth::user()->order?->where("status", 0)?->first();
        $this->pesanan_detail = $this->pesanan?->order_detail()->latest()->get();

        return view('livewire.keranjang', [
            "pesanan" => $this->pesanan,
            "pesanan_detail" => $this->pesanan_detail ?? [],
            "no" => 1
        ]);
    }

    // method hapus keranjang
    public function hapusKeranjang(OrderDetail $item_order)
    {
        $order = $item_order->order->where("status", 0)->first();

        if($order->order_detail->count() > 1) {
            $item_order->order->total_harga -= $item_order->total_harga;
            $item_order->order->update();
        }
        else { $order->delete(); }
        $item_order->delete();

        $this->emit("orderSuccess");

        session()->flash("success", "Item Berhasil Dihapus Dari Keranjang");

        return redirect()->back();
    }
}
