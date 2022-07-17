<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function getCategory(){
        return $this->belongsTo(Category::class);
    }
    public function getBrand(){
        return $this->belongsTo(Brand::class);
    }
}
