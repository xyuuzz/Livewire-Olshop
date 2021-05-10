<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $no_hp, $alamat;

    public function render()
    {
        if(!Auth::check()) {return redirect(route("login"));}

        $pesanan = Auth::user()->order->where("status", 0)->first();
        return view('livewire.checkout', compact('pesanan'));
    }

    public function checkout()
    {
        $this->validate([
            "no_hp" => "required|numeric|min:10",
            "alamat" => "required|string",
        ]);

        Auth::user()->order->where("status", 0)->first()->user->update([
            "no_hp" => $this->no_hp,
            "alamat" => $this->alamat
        ]);
        // update field status menjadi 1 (sudah checkout)
        Auth::user()->order()->where("status", 0)->update([
            "status" => 1
        ]);

        // emit untuk update keranjang
        $this->emit("orderSuccess");

        session()->flash("success", "Berhasil Checkout! Silahkan Bayar dan Tunggu dirumah sampai Jersey mu Datang :)");

        return redirect(route("history"));
    }
}
