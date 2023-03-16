<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'cnic',
        'cnic_image',
        'phone_number',
        'address',
        'description',
        'status',

    ];
    public function Order()
    {
        return $this->hasMany(Order::class);
    }

    public function Sale()
    {
        return $this->hasMany(Sale::class);
    }
    
}
 