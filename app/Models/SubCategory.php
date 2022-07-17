<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','photo','is_parent','parent_id','status'];


    public static function shiftChild($cat_id){
        return SubCategory::whereIn('id',$cat_id)->update(['is_parent'=>1]);
    }

    public static function getChildByParentID($id){
        return SubCategory::where('parent_id',$id)->pluck('title','id');
    }

    public function products(){
        return $this->hasMany('App\Models\Products','cat_id','id');
    }
}
