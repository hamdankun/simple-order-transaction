<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderCustomerData extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'name', 'phone', 'email', 'address', 'payment_proof_path'
    ];

    public function order() {
    	return $this->belongsTo(Order::class, 'order_id');
    }
}
