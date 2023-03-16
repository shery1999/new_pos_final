<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'price',
    'expiration',
    'quantity',
    'weight',
    'description',
    'status',

  ];

  public function OrderLine()
  {
    return $this->hasMany(OrderLine::class);
  }
}
