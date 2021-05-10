<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Liga extends Model
{
    protected $guarded = [];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}