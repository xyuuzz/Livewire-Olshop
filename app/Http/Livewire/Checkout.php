<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    // model livewire
    public $no_hp, $alamat;

    public function render()
    {
        $this->no_hp = Auth::user()?->no_hp;
        $this->alamat = Auth::user()?->alamat;

        $pesanan = Auth::user()->order->where("status", 0)->first();
        return view('livewire.checkout', compact('pesanan'));
    }

    public function checkout()
    {
        $this->validate([
            "no_hp" => "required|numeric",
            "alamat" => "required|string",
        ]);

        // jika field alamat milik user null, maka update field alamat + no_hp dengan yang diisi di form
        if(!Auth::user()->alamat){
            Auth::user()->update([
                "no_hp" => $this->no_hp,
                "alamat" => $this->alamat
            ]);
        }

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
