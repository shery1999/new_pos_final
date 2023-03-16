<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'price',
        'order_id',
        'item_id',
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function Items()
    {        
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }

    // public function Items()
    // {
    // return $this->hasOne(Items::class,'id', 'item_id');
    // }
}
// foreach ($orders as $order) {
//     $orderLines = $order->orderLines;
//     foreach ($orderLines as $orderLine) {
//         $item = $orderLine->item;
//         dump($item);
//     }
// }
