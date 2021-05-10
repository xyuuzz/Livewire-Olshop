<?php

namespace App\Models;

use App\Models\{User, OrderDetail};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    protected $fillable = [
        "kode_pesanan",
        "status",
        "total_harga",
        "kode_unik"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class);
    }

}
