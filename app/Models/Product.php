<?php

namespace App\Models;

use App\Models\{Liga, OrderDetail};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [];

    public function liga()
    {
        return $this->belongsTo(Liga::class);
    }

    public function OrderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
