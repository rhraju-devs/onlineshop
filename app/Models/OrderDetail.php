<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class OrderDetail extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function orderDetails()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
