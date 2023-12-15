<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'make',
        'model',
        'year',
        'color',
        'transmission',
        'price',
    ];
    
    public function orders()
{
    return $this->hasMany(Order::class);
}
}
