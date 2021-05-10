<?php

namespace App\Http\Livewire;

use App\Models\{Product, Order, OrderDetail};
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ProductDetail extends Component
{
    public Product $product;

    public static $nilai = 0;
    public $nameset;
    public $nomor_nameset, $nama_nameset, $jumlah_pesanan;


    public function render()
    {
        $product = $this->product;
        $route = $product->nama;

        return view('livewire.product-detail', compact("product", "route"));
    }

    public function nameset()
    {
        self::$nilai++;
        $this->nameset = true;

        if(self::$nilai % 2 === 0) {
            $this->nameset = 1;
        }
    }

    public function masukan_keranjang()
    {
        // redirect jika user belum login
        if(!Auth::check()) {
            return redirect()->route("login");
        }

        // var untuk validate jumlah pesanan
        $validate = ["jumlah_pesanan" => "required|numeric|max:100"];

        // Jika checkbox nameset dicentang dan jumlah pesananya < 2
        if($this->nameset && $this->jumlah_pesanan < 2) {
            $validate["nomor_nameset"] = "required|numeric|max:999";
            $validate["nama_nameset"] = "required|string|max:12";
        } else {
            $this->nameset = false;
        }

        // validate form sesuai dengan array validate yang sudah didefinisikan
        $this->validate($validate);


        // logic ada dibawah
        $total_harga = $this->jumlah_pesanan * $this->product->harga;
        // jika user tambah nameset, maka tambahkan harga nameset, jika tidak maka harga tetap
        if($this->nama_nameset) {
            $total_harga += $this->product->harga_nameset;
        }

        if(!count($user_order = Auth::user()->order->where("status", 0))) {
            // buat data di table order jika user tidak punya riwayat order
            $user_order = Auth::user()->order()->create([
                "kode_pesanan" => uniqid() . Auth::id() . $this->product->id,
                "status" => 0,
                "total_harga" => $total_harga,
                "kode_unik" => mt_rand(100, 999),
            ]);
        } else {
            // Jika user memiliki riwayat order, maka update saja total harga nya.
            $user_order->first()->update([
                "total_harga" => $user_order->first()->total_harga + $total_harga
            ]);
        }


        // buat data di table order detail
        $user_order->where("status", 0)->first()->order_detail()->create([
            "product_id" => $this->product->id,
            "jumlah_pesanan" => $this->jumlah_pesanan,
            "total_harga" => $total_harga,
            "name_set" => $this->nameset,
            "name" => $this->nama_nameset,
            "no" => $this->nomor_nameset,
        ]);

        // mengirim emit yang nanti akan digunakan untuk update keranjang
        $this->emit("orderSuccess");

        session()->flash("success", "Berhasil Menambahkan ke Keranjang");

        return redirect()->back();
    }
}
