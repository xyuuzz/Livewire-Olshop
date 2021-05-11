<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class Keranjang extends Component
{
    protected $order, $order_detail;

    public function render()
    {
        // ambil user order milik user yang status nya adalah 0
        $this->order = Auth::user()?->order?->where("status", 0)?->first();
        // ambil order_detail milik order diatas
        $this->order_detail = $this->order?->order_detail()?->latest()?->get();

        return view('livewire.keranjang', [
            "order" => $this->order,
            "order_detail" => $this->order_detail ?? [],
            "no" => 1
        ]);
    }

    // method hapus keranjang
    public function hapusKeranjang(OrderDetail $item_order)
    {
        // ambil order user yang status nya 0
        $order = $item_order->order->where("status", 0)->first();

        // jika order_detail milik order user lebih dari 1, maka hapus order detail nya saja, namun jika hanya 1, hapus order_detail + order
        if($order->order_detail->count() > 1) {
            $item_order->order->total_harga -= $item_order->total_harga;
            $item_order->order->update();
        }
        else { $order->delete(); }

        // setelah menghapus order_detail milik order, maka hapus field order nya
        $item_order->delete();

        $this->emit("orderSuccess");

        session()->flash("success", "Item Berhasil Dihapus Dari Keranjang");

        return redirect()->back();
    }
}
