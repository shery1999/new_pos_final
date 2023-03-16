<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'subtotal_price',
        'total_price',
        'discount',
        'description',

        'order_id',
        'user_id',
        'customer_id',
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function Users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    public function Customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }
}
