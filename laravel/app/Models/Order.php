<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Vehicle;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'vehicle_id',
        'quantity',
        'total_amount',
    ];

    // $table->foreignId('customer_id')->constrained();
    //         $table->foreignId('vehicle_id')->constrained();
    //         $table->integer('quantity');
    //         $table->float('total_amount');

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }


}
