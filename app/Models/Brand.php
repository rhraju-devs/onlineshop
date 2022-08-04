<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded =[];
    use HasFactory;

    public function products() {
        return $this->hasMany(Product::class, 'product_brand', 'id');
    }
}
