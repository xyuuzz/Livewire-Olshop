<?php

namespace App\Models;

use App\Models\{Order, Product};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    protected $fillable = [
        "product_id",
        "order_id",
        "jumlah_pesanan",
        "total_harga",
        "name_set",
        "name",
        "no"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
