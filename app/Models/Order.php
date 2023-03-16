<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
    ];

    public function OrderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function Customers()
    {
        return $this->belongsTo(Customers::class, 'customer_id', 'id');
    }
    
}