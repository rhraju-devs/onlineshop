<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Image;

class Product extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class,'product_category','id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Category::class,'product_sub_category','id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'product_brand','id');
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
}
