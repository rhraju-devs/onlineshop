<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function orderGet()
    {
        return $this->belongsTo(OrderDetail::class);
    }
    public function userGet()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
